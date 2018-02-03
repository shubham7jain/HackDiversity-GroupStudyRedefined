from flask import Flask, request
from flask_cors import CORS, cross_origin
import json
import mysql.connector
import uuid
import os

application = Flask(__name__)
CORS(application)

@application.route('/createGroup', methods=['POST'])
def createGroup():
    if request.method == "POST":

    	json_dict = json.loads(request.data)
    	uin = json_dict["uin"]
    	name = json_dict["name"]
    	courseNumber = json_dict["courseNumber"]
    	startDate = json_dict["startDate"]
    	endDate = json_dict["endDate"]
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
    	return json.dumps('{"message": "Group is created successfully."}')

@application.route('/getGroups')
def getAllPosts():
    cnx = mysql.connector.connect(user='shubham7jain', password='mikeliu',
                      host='db4free.net',
                      port=3307,
                      database='student_groups')
    cursor = cnx.cursor()

    query = ("SELECT `course`, `name`, `uin`, `startTime`, `endTime`, `location` from `Groups`")

    cursor.execute(query)

    result = []
    for (course, name, uin, startTime, endTime, location) in cursor:
    	result.append({
    		"course": course,
    		"name": name,
    		"uin": uin,
    		"startTime": str(startTime),
    		"endTime": str(endTime),
    		"location": location
    		})

    cursor.close()
    cnx.close()
    return json.dumps(result)

if __name__ == '__main__':
    port = int(os.environ.get("PORT", 33507))
    application.run(host='0.0.0.0', debug=True, port=port)