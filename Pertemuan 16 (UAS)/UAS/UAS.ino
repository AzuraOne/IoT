char serialData;
int pinA = 10;
int pinB = 11;
int pinC = 12;
int pinD = 13;
int analogPin = A0;
int sensorVal;

void setup() {
  pinMode(pinA, OUTPUT);
  pinMode(pinB, OUTPUT);
  pinMode(pinC, OUTPUT);
  pinMode(pinD, OUTPUT);
  Serial.begin(9600);
}

void loop() {
  sensorVal = analogRead(analogPin);
  float mv = ( sensorVal/1024.0)*5000;
  float val = mv/10;
  Serial.println(val);
  delay(1000);
  
}
