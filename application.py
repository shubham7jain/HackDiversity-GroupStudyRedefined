from flask import Flask, request
import json
import mysql.connector

application = Flask(__name__)

@application.route('/createGroup', methods=['POST'])
def createGroup():
    if request.method == "POST":
    	cnx = mysql.connector.connect(user='smalltigerson', password='123456',
                              host='database2.cs.tamu.edu',
                              database='smalltigerson')
    	cursor = cnx.cursor()

    	query = ("SELECT uin FROM Groups ")

    	cursor.execute(query)

    	for (uin) in cursor:
    		print(uin)

    	json_dict = json.loads(request.data)
    	uin = json_dict["uin"]
    	name = json_dict["name"]
    	courseNumber = json_dict["courseNumber"]
    	startDate = json_dict["startDate"]
    	endDate = json_dict["endDate"]
    	location = json_dict["location"]
    	cursor.close()
    	cnx.close()
    	return json.dumps('{"uin":' + uin + '}')