import mysql.connector as MySQL
import random
from datetime import datetime
import time

now = datetime.now()
s2 = now.strftime("%d-%m-%Y %H:%M:%S")
# dd/mm/YY H:M:S format


# Open database connection
mydb = MySQL.connect(
    host="localhost",
    user="root",
    password="",
    database="iot2"
)
cursor = mydb.cursor(buffered=True)

print("=============== Pilih ID Ruangan ==================")
device = cursor.execute("SELECT count(*) FROM Ruangan")
jumlahruang = cursor.fetchone()
nr = 0
cursor.execute("SELECT Id_ruangan, Nama_ruangan from Ruangan")
Ruangan = cursor.fetchall()
k = 1
for x in Ruangan:
    
    print(str(k),"ID :" + str(x[nr]),"Ruang :" + (x[nr+1]))
    k += 1

idruangan = int(input("\nKetik ID ruangan : "))


print("\n=============== Pilih ID Sensor ==================")
sensor = cursor.execute("SELECT count(*) FROM Sensor")
Jumlahsensor = cursor.fetchone()
ns = 0
cursor.execute("SELECT Id_sensor, Nama_sensor from Sensor")
Sensor = cursor.fetchall()
k = 1
for y in Sensor:
    
    print(str(k),"ID :" + str(y[ns]),"Ruang :" + (y[ns+1]))
    k += 1

    
idsensor = int(input("\nKetik ID Sensor : "))
print(idsensor)
if idsensor == 1:
    
    list_tabel = []
    now = datetime.now()

    checkingtime = 1
    t_end = time.time() + 60 * checkingtime
    while time.time() < t_end:
        print("░░░░░░░░░░░░░░░░░░░░░▄▀░░▌")
        print("░░░░░░░░░░░░░░░░░░░▄▀▐░░░▌")
        print("░░░░░░░░░░░░░░░░▄▀▀▒▐▒░░░▌")
        print("░░░░░▄▀▀▄░░░▄▄▀▀▒▒▒▒▌▒▒░░▌")
        print("░░░░▐▒░░░▀▄▀▒▒▒▒▒▒▒▒▒▒▒▒▒█")
        print("░░░░▌▒░░░░▒▀▄▒▒▒▒▒▒▒▒▒▒▒▒▒▀▄")
        print("░░░░▐▒░░░░░▒▒▒▒▒▒▒▒▒▌▒▐▒▒▒▒▒▀▄")
        print("░░░░▌▀▄░░▒▒▒▒▒▒▒▒▐▒▒▒▌▒▌▒▄▄▒▒▐")
        print("░░░▌▌▒▒▀▒▒▒▒▒▒▒▒▒▒▐▒▒▒▒▒█▄█▌▒▒▌")
        print("░▄▀▒▐▒▒▒▒▒▒▒▒▒▒▒▄▀█▌▒▒▒▒▒▀▀▒▒▐░░░▄")
        print("▀▒▒▒▒▌▒▒▒▒▒▒▒▄▒▐███▌▄▒▒▒▒▒▒▒▄▀▀▀▀")
        print("▒▒▒▒▒▐▒▒▒▒▒▄▀▒▒▒▀▀▀▒▒▒▒▄█▀░░▒▌▀▀▄▄")
        print("▒▒▒▒▒▒█▒▄▄▀▒▒▒▒▒▒▒▒▒▒▒░░▐▒▀▄▀▄░░░░▀")
        print("▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒▄▒▒▒▒▄▀▒▒▒▌░░▀▄")
        print("▒▒▒▒▒▒▒▒▀▄▒▒▒▒▒▒▒▒▀▀▀▀▒▒▒▄▀")
        print("Please Wait patiently :)")



    waktu = now.strftime("%d-%m-%Y %H:%M:%S")
    suhu = str(random.randint(18, 90))
    id = cursor.lastrowid

    list_input = id,suhu,waktu,idruangan
    list_tabel.append(list_input)
    

    sq = "INSERT INTO Sensor_suhu (Id_suhu, Suhu, Tanggal_suhu, Id_ruangan) VALUES (%s, %s, %s, %s);"
    input = cursor.executemany(sq, list_tabel)
    
    print("Data to Commited",list_tabel)
    mydb.commit()
    print("Row Effected : " + str(cursor.rowcount), "BERHASIL Menginputkan Ke database")
elif idsensor == 2:
    list_tabel = []
    now = datetime.now()
    checkingtime = 1
    t_end = time.time() + 60 * checkingtime
    while time.time() < t_end:
        print("░░░░░░░░░░░░░░░░░░░░░▄▀░░▌")
        print("░░░░░░░░░░░░░░░░░░░▄▀▐░░░▌")
        print("░░░░░░░░░░░░░░░░▄▀▀▒▐▒░░░▌")
        print("░░░░░▄▀▀▄░░░▄▄▀▀▒▒▒▒▌▒▒░░▌")
        print("░░░░▐▒░░░▀▄▀▒▒▒▒▒▒▒▒▒▒▒▒▒█")
        print("░░░░▌▒░░░░▒▀▄▒▒▒▒▒▒▒▒▒▒▒▒▒▀▄")
        print("░░░░▐▒░░░░░▒▒▒▒▒▒▒▒▒▌▒▐▒▒▒▒▒▀▄")
        print("░░░░▌▀▄░░▒▒▒▒▒▒▒▒▐▒▒▒▌▒▌▒▄▄▒▒▐")
        print("░░░▌▌▒▒▀▒▒▒▒▒▒▒▒▒▒▐▒▒▒▒▒█▄█▌▒▒▌")
        print("░▄▀▒▐▒▒▒▒▒▒▒▒▒▒▒▄▀█▌▒▒▒▒▒▀▀▒▒▐░░░▄")
        print("▀▒▒▒▒▌▒▒▒▒▒▒▒▄▒▐███▌▄▒▒▒▒▒▒▒▄▀▀▀▀")
        print("▒▒▒▒▒▐▒▒▒▒▒▄▀▒▒▒▀▀▀▒▒▒▒▄█▀░░▒▌▀▀▄▄")
        print("▒▒▒▒▒▒█▒▄▄▀▒▒▒▒▒▒▒▒▒▒▒░░▐▒▀▄▀▄░░░░▀")
        print("▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒▄▒▒▒▒▄▀▒▒▒▌░░▀▄")
        print("▒▒▒▒▒▒▒▒▀▄▒▒▒▒▒▒▒▒▀▀▀▀▒▒▒▄▀")
        print("Please Wait patiently :)")




    waktu = now.strftime("%d-%m-%Y %H:%M:%S")
    kelembapan = str(random.randint(10, 90))
    id = cursor.lastrowid

    list_input = id,kelembapan,waktu,idruangan
    list_tabel.append(list_input)
    

    sq = "INSERT INTO Sensor_kelembapan (Id_kelembapan, kelembapan, Tanggal_kelembapan, Id_ruangan) VALUES (%s, %s, %s, %s);"
    input = cursor.executemany(sq, list_tabel)
    
    print("Data to Commited",list_tabel)
    mydb.commit()
    print("Row Effected : " + str(cursor.rowcount), "BERHASIL Menginputkan Ke database")
else:
    print("ID Tidak Terdaftar")

cursor.close()
mydb.close()


