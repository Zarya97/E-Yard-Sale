import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password = "Nashville2022@",
    database = "yardsale"
       )

mycursor = mydb.cursor()

fetchData = "SELECT * from inventory"

mycursor.execute(fetchData)

answer = mycursor.fetchall()


for x in answer:
  print(x)
