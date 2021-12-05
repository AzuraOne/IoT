#include <EtherCard.h>
#define pirPin 3
#define STATIC 1

#if STATIC
static byte myip[] = {192,168,0,25};
static byte gwip[] = {192,168,0,21};

#endif


static byte mymac[] = { 0x74,0x69,0x69,0x2D,0x30,0x31 };

int calibrationTime = 30;
//long unsigned int lowIn;
//long unsigned int pause = 5000;
String STATUS;

byte Ethernet::buffer[500]; // tcp/ip send and receive buffer

const char page[] PROGMEM =
"HTTP/1.0 503 My Service \r\n"
"Content-Type: text/html\r\n"
"Retry-After: 600\r\n"
"\r\n"
"<html>"
  "<head><title>"
    "Sensor Pir Detector"
  "</title></head>"
  "<body>"
  "<h1>Sensor Pir detector</h1>"
    "<h3>"
    "STATUS"
    "</h3>"

    "<p><em>"
      "<br />"
      ""
    "</em></p>"
  "</body>"
"</html>"
;


void setup()
{
  Serial.begin(9600);
  pinMode(pirPin, INPUT);

    if (ether.begin(sizeof Ethernet::buffer, mymac, 10) == 0)
    Serial.println( "Failed to access Ethernet controller");
  #if STATIC
  ether.staticSetup(myip, gwip);
  #else
  if (!ether.dhcpSetup())
    Serial.println("DHCP failed");
  #endif

  ether.printIp("IP:  ", ether.myip);
  ether.printIp("GW:  ", ether.gwip);
  ether.printIp("DNS: ", ether.dnsip);
}

  


void loop()
{
  PIRSensor();
  ethernet();
}

void PIRSensor() {
  Serial.print("Motion : ");
  if (digitalRead(pirPin) == HIGH)
  {
    Serial.println("Motion detected.");
    STATUS = "Motion Detected";
  }
  else if (digitalRead(pirPin) == LOW)
  {
    Serial.println("Motion Ended");
    STATUS = "Motion Ended";
  }
}

void ethernet() {
   if (ether.packetLoop(ether.packetReceive())) {
    memcpy_P(ether.tcpOffset(), page, sizeof page);
    ether.httpServerReply(sizeof page - 1);
  }
}
