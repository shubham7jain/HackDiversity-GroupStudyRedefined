from flask import Flask, request
from flask_cors import CORS, cross_origin
import json
import mysql.connector
import uuid
import os
import time
import datetime

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

    	cnx = mysql.connector.connect(user='shubham7jain', password='mikeliu',
                      host='db4free.net',
                      port=3307,
                      database='student_groups')
    	cursor = cnx.cursor()

    	createGroup = ("INSERT INTO `Groups` "
               "(`postid`, `course`, `name`, `uin`, `startTime`, `endTime`, `location`, `capacity`) "
               "VALUES (%s, %s, %s, %s, %s, %s, %s, %s)")

    	data = (uuid.uuid4().hex, courseNumber, name, uin, startDate, endDate, location, capacity)

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

    query = ("SELECT `course`, `name`, `uin`, `startTime`, `endTime`, `location`, `capacity` from `Groups`")

    cursor.execute(query)

    current = datetime.datetime.now()
    result = []
    for (course, name, uin, startTime, endTime, location, capacity) in cursor:
        end =  datetime.datetime.strptime(str(endTime), '%Y-%m-%d %H:%M:%S');
        print(end, current)
        if(end > current):
        	result.append({
        		"course": course,
        		"name": name,
        		"uin": uin,
        		"startTime": str(startTime),
        		"endTime": str(endTime),
        		"location": location,
                "capacity": capacity
        		})

    cursor.close()
    cnx.close()
    return json.dumps(result)

if __name__ == '__main__':
    port = int(os.environ.get("PORT", 33507))
    application.run(host='0.0.0.0', debug=True, port=port)