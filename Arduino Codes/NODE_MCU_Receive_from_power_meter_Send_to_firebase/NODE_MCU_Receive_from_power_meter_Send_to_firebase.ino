#include <ESP8266WiFi.h>
#include <FirebaseArduino.h>
#include <SoftwareSerial.h>
SoftwareSerial s(D6,D5);
#include <ArduinoJson.h>

// Set these to run example.
#define FIREBASE_HOST "laravelfirebase-208ac.firebaseio.com"
#define FIREBASE_AUTH "kjxALhZn232jMAlRF7jYR31KZmiDXKDxZJPK9q74"
#define WIFI_SSID "519"
#define WIFI_PASSWORD "bolajabena"
#define warning1 D0   
#define warning2 D1   
#define warning3 D2   



void setup() {
   Serial.begin(9600);
   pinMode(warning1, OUTPUT);
   pinMode(warning2, OUTPUT);
   pinMode(warning3, OUTPUT);

//  // connect to wifi.
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
   Serial.println("wifi ");
  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
  
  Serial.println("connected: ");
  //Serial.println(WiFi.localIP());
  
  
  s.begin(115200);
  while (!Serial) continue;

 
}


void loop() {

  
  
  s.write("s");
  s.read();
  DynamicJsonBuffer jsonBuffer;
  JsonObject& root = jsonBuffer.parseObject(s);
  if (root == JsonObject::invalid())
    return;
  root.prettyPrintTo(Serial);
  float consumehome1 = root["watthr1"];
  float consumehome2 = root["watthr2"];
  float consumehome3 = root["watthr3"];
  //float consumehome4 = root["watthr4"];
  

  //Serial.println(String(consume1)+" "+String(consume2)+ " "+String(consume3)+" "+String(consume4));
  Serial.println(String(consumehome1)+" "+String(consumehome2)+ " "+String(consumehome3));
  
  float n1 = Firebase.getFloat("ConsumeData/Device1/Energy");
  float n2 = Firebase.getFloat("ConsumeData/Device2/Energy");
  float n3 = Firebase.getFloat("ConsumeData/Device3/Energy");
  
  float limit = Firebase.getFloat("ConsumeData/Limit");
  Serial.println(limit);
  

  float consume1=consumehome1+n1;
  float consume2=consumehome2+n2;
  float consume3=consumehome3+n3;
  //float consume4=consumehime4+n4;

  Firebase.setFloat("/ConsumeData/Device1/Energy",consume1);
  Firebase.setFloat("/ConsumeData/Device2/Energy",consume2);
  Firebase.setFloat("/ConsumeData/Device3/Energy",consume3);
  //Firebase.setFloat("/ConsumeData/Device4/Energy",consume4);
  if(limit<consume1)
  {
    digitalWrite(warning1, HIGH);
  }
  else 
  {
    digitalWrite(warning1, LOW);
  }
  if(limit<consume2)
  {
    digitalWrite(warning2, HIGH);
  }
  else 
  {
    digitalWrite(warning2, LOW);
  }

  if(limit<consume3)
  {
    digitalWrite(warning3, HIGH);
  }
  else 
  {
    digitalWrite(warning3, LOW);
  }
  
  
  

  Serial.println(n1);
  Serial.println(n2);
  Serial.println(n3);
  Serial.println(limit);
  


  delay(500);
}
