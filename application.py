from flask import Flask, request
from flask_cors import CORS, cross_origin
import json
import mysql.connector
import uuid
import os
import time
import datetime
import pytz

application = Flask(__name__)
CORS(application)

@application.route('/createGroup', methods=['POST'])
def createGroup():
    if request.method == "POST":

        json_dict = json.loads(request.data)

        uin = json_dict["uin"]
        name = json_dict["name"]
        courseNumber = json_dict["courseNumber"]
        startDate = datetime.date.strftime(datetime.datetime.strptime(json_dict["startDate"], '%m/%d/%Y %I:%M %p'), '%Y-%m-%d %H:%M')
        endDate = datetime.date.strftime(datetime.datetime.strptime(json_dict["endDate"], '%m/%d/%Y %I:%M %p'), '%Y-%m-%d %H:%M')
        location = json_dict["location"]
        capacity = json_dict["capacity"]
        contact = json_dict["contact"]

        cnx = mysql.connector.connect(user='shubham7jain', password='mikeliu',
                      host='db4free.net',
                      port=3307,
                      database='student_groups')
        cursor = cnx.cursor()

        createGroup = ("INSERT INTO `Groups` "
               "(`postid`, `course`, `name`, `uin`, `startTime`, `endTime`, `location`, `capacity`, `contact`) "
               "VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)")

        data = (uuid.uuid4().hex, courseNumber, name, uin, startDate, endDate, location, capacity, contact)

        cursor.execute(createGroup, data)

        cnx.commit()
        cursor.close()
        cnx.close()
        return json.dumps({"message": "Group is created successfully."})

@application.route('/getGroups')
def getAllPosts():
    cnx = mysql.connector.connect(user='shubham7jain', password='mikeliu',
                      host='db4free.net',
                      port=3307,
                      database='student_groups')
    cursor = cnx.cursor()

    query = ("SELECT `postid`, `course`, `name`, `uin`, `startTime`, `endTime`, `location`, `capacity`, `contact` from `Groups` where `capacity` > 0")

    cursor.execute(query)

    tz = pytz.timezone('US/Central')
    current = datetime.datetime.now(tz)
    result = []
    for (postid, course, name, uin, startTime, endTime, location, capacity, contact) in cursor:
        end =  datetime.datetime.strptime(str(endTime), '%Y-%m-%d %H:%M:%S');
        print(end, current)
        current = current.replace(tzinfo=None)
        print(current)
        if(end > current):
            result.append({
                "postid": postid,
                "course": course,
                "name": name,
                "uin": uin,
                "startTime": str(startTime),
                "endTime": str(endTime),
                "location": location,
                "capacity": capacity,
                "contact": contact
                })

    cursor.close()
    cnx.close()
    return json.dumps(result)

@application.route('/joinGroup', methods=['POST'])
def joinGroup():
    if request.method == "POST":

        json_dict = json.loads(request.data)
        postId = json_dict["postid"]

        if(int(json_dict["capacity"]) == 0):
            return json.dumps('{"message": "Capacity is full!"}')

        cnx = mysql.connector.connect(user='shubham7jain', password='mikeliu',
                      host='db4free.net',
                      port=3307,
                      database='student_groups')
        cursor = cnx.cursor()

        createGroup = ("""UPDATE `Groups` SET `capacity` = (`capacity` - 1) WHERE `postid` = %(postid)s""")

        cursor.execute(createGroup, {'postid':postId})

        cnx.commit()
        cursor.close()
        cnx.close()
        return json.dumps('{"message": "Group is joint successfully."}')

if __name__ == '__main__':
    port = int(os.environ.get("PORT", 33507))
    application.run(host='0.0.0.0', debug=True, port=port)
