# SPDX-FileCopyrightText: 2021 ladyada for Adafruit Industries
# SPDX-License-Identifier: MIT

import pymysql
import time
import board
from adafruit_htu21d import HTU21D
from datetime import datetime


# Create sensor object, communicating over the board's default I2C bus
i2c = board.I2C()  # uses board.SCL and board.SDA
sensor = HTU21D(i2c)
connection = pymysql.connect(host="172.20.10.10", user="root", passwd="test1234", unix_socket="/run/mysqld/mysqld.sock", database="meteo")
now = datetime.now()
current_time = now.strftime("%H:%M:%S")
print(connection)
try:

                                     

    # Create a cursor object

    cursorObject = connection.cursor()                                     

 

    # SQL query string

    sqlQuery = "select * from releves"

 

    # Execute the sqlQuery

    cursorObject.execute(sqlQuery)

 

    #Fetch all the rows

    rows = cursorObject.fetchall()


    for row in rows:

        print(row[1])

        print(row["temperature"])   

        print(row["humidite"])   

        print(row["heure"])   

except Exception as e:

    print("Exeception occured:{}".format(e))

finally:
    while True:  
        print("\nTemperature: %0.1f C" % sensor.temperature)
        print("Humidity: %0.1f %%" % sensor.relative_humidity)
        insertStatement = "INSERT INTO releves (id_capteur, temperature, humidite, heure) VALUES (1,%s,%s,%s)"
        val=(sensor.temperature, sensor.relative_humidity, now)  
        cursorObject.execute(insertStatement,val)
        connection.commit()
        time.sleep(30)
    connection.close()
    print("test")
