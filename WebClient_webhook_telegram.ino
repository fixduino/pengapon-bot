/*
  Web client

 This sketch connects to a website (http://www.google.com)
 using an Arduino Wiznet Ethernet shield.

 Circuit:
 * Ethernet shield attached to pins 10, 11, 12, 13

 created 18 Dec 2009
 by David A. Mellis
 modified 9 Apr 2012
 by Tom Igoe, based on work by Adrian McEwen

 */

#include <SPI.h>
#include <Ethernet.h>

// Enter a MAC address for your controller below.
// Newer Ethernet shields have a MAC address printed on a sticker on the shield
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

//byte mac[] = {  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
// change to your network settings
IPAddress ip(192,168,8,19);
IPAddress gateway(192, 168, 8, 1);
IPAddress subnet(255, 255, 255, 0);

// if you don't want to use DNS (and reduce your sketch size)
// use the numeric IP instead of the name for the server:
//IPAddress server(74,125,232,128);  // numeric IP for Google (no DNS)
char server[] = "www.dapuralena.com";    // name address for Google (using DNS)

// Set the static IP address to use if the DHCP fails to assign
//IPAddress ip(192, 168, 8, 177);

// Initialize the Ethernet client library
// with the IP address and port of the server
// that you want to connect to (port 80 is default for HTTP):
EthernetClient client;
char pageAdd[256]; //128 256
char inChar; 
String dataIn;


#define delayMillis 10000UL //30000UL=30detik 15mnt=900000UL
unsigned long thisMillis = 0;
unsigned long lastMillis = 0;
int sensorPompa = 2;
int statPompa = 0;
String txtStatus ;
String pompaId="pompa1";
String textStatus;



long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 5000; // READING INTERVAL
String data;

void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }

  // start the Ethernet connection DHCP:
//  if (Ethernet.begin(mac) == 0) {
//    Serial.println("Failed to configure Ethernet using DHCP");
//    // no point in carrying on, so do nothing forevermore:
//    // try to congifure using IP address instead of DHCP:
//    Ethernet.begin(mac, ip);
//  }

// Start ethernet IPSTATIS
  Serial.println(F("Starting ethernet..."));
  Ethernet.begin(mac, ip, gateway, gateway, subnet);

  // If using dhcp, comment out the line above
  // and uncomment the next 2 lines
  // if(!Ethernet.begin(mac)) Serial.println(F("failed"));
 //  else Serial.println(F("ok"));
 
  digitalWrite(10,HIGH);
  Serial.println(Ethernet.localIP());
  delay(2000);
  Serial.println(F("Ready"));


//  // give the Ethernet shield a second to initialize:
//  delay(1000);
//  Serial.println("connecting...");

   // make the pushbutton's pin an input:
  pinMode(sensorPompa, INPUT);
}

void loop()
{
  
  currentMillis = millis();
  if(currentMillis - previousMillis > interval) { // READ ONLY ONCE PER INTERVAL
    previousMillis = currentMillis;
    bacaStatusPompa();

    
  }
//  bacaStatusPompa();
  if (statPompa == 1) {
    data = "ids=RescuePump1&pesan=Pompa ON";
  }else if (statPompa == 0) {
    data = "ids=RescuePump1&pesan=Pompa OFF";
  }
  
 /// data += textStatus;
  //data = "temp1=" + t + "&hum1=" + h;
Serial.print(data);
  if (client.connect("www.dapuralena.com",80)) { // REPLACE WITH YOUR SERVER ADDRESS
    client.println("POST /bot_pon/tambah2post.php HTTP/1.1"); 
    client.println("Host: www.dapuralena.com"); // SERVER ADDRESS HERE TOO
    client.println("Content-Type: application/x-www-form-urlencoded"); 
    client.print("Content-Length: "); 
    client.println(data.length()); 
    client.println(); 
    client.print(data); 
  } 

  if (client.connected()) { 
    client.stop();  // DISCONNECT FROM THE SERVER
  }

  delay(5000); // WAIT FIVE MINUTES BEFORE SENDING AGAIN

  
  
  
  
  
  
  
  
  /*
  
  // if there are incoming bytes available
  // from the server, read them and print them:
delay(5000);
   bacaStatusPompa();

   String urlOFF = "GET /bot_pon/tambah.php?ids=pompa1&pesan=OFF HTTP/1.1";
    String urlON = "GET /bot_pon/tambah.php?ids=pompa1&pesan=ON HTTP/1.1";
    if (statPompa==1) {
       url = urlON;
    }else if (statPompa==1) {
       url= urlOFF;
    }
 

  // if you get a connection, report back via serial:
  if (client.connect(server, 80)) {
    Serial.println("connected");
    // Make a HTTP request:
   client.println("GET /bot_pon/tambah.php?ids=pompa1&pesan=ON HTTP/1.1");
    client.println("Host: www.dapuralena.com");
    client.println("Connection: close");
    client.println();
  }
  else {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed");
  }

   if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }

  // if the server's disconnected, stop the client:
  if (!client.connected()) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();

    // do nothing forevermore:
    while (true);
  }
  */
}


void bacaStatusPompa(){
   delay(300);
  
  // read the input pin:
  int PompaState = digitalRead(sensorPompa);
  // print out the state of the button:
 if ((PompaState ==LOW) && (statPompa==0)){
  Serial.println("Pompa ON");
  statPompa=1;
  txtStatus="ON";
 }else
    if ((PompaState ==HIGH) && (statPompa==1)){
    Serial.println("Pompa OFF");
    statPompa=0;
  txtStatus="OFF";
  }
  delay(1);        // delay in between reads for stability
 }
