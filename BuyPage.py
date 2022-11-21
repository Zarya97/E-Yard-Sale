import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
     user="root"
       )

mycursor = mydb.cursor()

fetchData = "SELECT id from inventory"

mycursor.execute(fetchData)

answer = mycursor.fetchAll()

print(mydb)
