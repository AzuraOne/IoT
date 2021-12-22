import serial

import requests

arduino = serial.Serial('COM1', 9600)

def ledControl(cmd):
    arduino.write(cmd.encode())
    
while True:
    rawArd = arduino.readline()
    data = rawArd[0:len(rawArd)-2].decode("utf-8")
    payload = {'suhu': data}
    resp = requests.get("http://localhost/IoTUAS/", params=payload)
    print(resp.text)
  

   