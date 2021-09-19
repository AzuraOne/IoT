from gpio import *
from time import *

def handleSensorData(): # Berfungsi untuk tempat sensor diproses
	value = digitalRead(0) # menyimpan data sensor dari kabel 0 motion sensor
	if value == 0: # pengondisian jika data dari sensor memiliki besaran 0  maka
		customWrite(1,'0') # menutup pintu
		customWrite(2,'0') # menutup garasi
		print("Gerakan Tak Terdeteksi") # menampilkan serial console agar dapat diketahui kondisinya
	else: # berfungsi untuk pengondisian selain nilai 0 atau ada gerakan
		customWrite(1,'1') #  pintu akan terbuka kareka customWrite ini dari port 1 yang terhubung dengan port 0 pada pintu
		customWrite(2,'1') # membuka pintu garasi 
		print("Gerakan Terdeteksi") # menjalankan tulisan Gerakan terdeteksi

def main():# menampung letak sensor dijalankan
	add_event_detect(0, handleSensorData) # menjalankan operasi pendeteksian sensor
	
	while True: # melakukan looping agar sensor tdak berhenti mendeteksi
		delay(1000) # memiliki delai 1000

if __name__ == "__main__": # menjalankan fungsi main
	main()