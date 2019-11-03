#include <SoftwareSerial.h>
#include <ArduinoJson.h>


SoftwareSerial s(5,6);

int currentPin1 = 1;
int currentPin2 = 2;
int currentPin3 = 3;
int currentPin4 = 4;

double kiloswatthr1 = 0;
double kiloswatthr2 = 0;
double kiloswatthr3 = 0;
double kiloswatthr4 = 0;

int peakPower1 = 0;
int peakPower2 = 0;
int peakPower3 = 0;
int peakPower4 = 0;

void setup() 
{ 
  Serial.begin(9600);
  s.begin(115200);
  Serial.println("Running");
}

void loop() 
{ 
  DynamicJsonBuffer jsonBuffer;
  JsonObject& root = jsonBuffer.createObject();
  int current1 = 0;
  int current2 = 0;
  int current3 = 0;
  int current4 = 0;
  
  int maxCurrent1 = 0;
  int maxCurrent2 = 0;
  int maxCurrent3 = 0;
  int maxCurrent4 = 0;
  
  int minCurrent = 1000;
  for (int i=0 ; i<=200 ; i++)  //Monitors and logs the current input for 200 cycles to determine max and min current
  {
    current1 = analogRead(currentPin1);    //Reads current input and records maximum and minimum current
    current2 = analogRead(currentPin2);
    current3 = analogRead(currentPin3);
    current4 = analogRead(currentPin4);
    
    if(current1 >= maxCurrent1)
      maxCurrent1 = current1;
    else if(current1 <= minCurrent)
      minCurrent = current1;

      if(current2 >= maxCurrent2)
      maxCurrent2 = current2;
      if(current3 >= maxCurrent3)
      maxCurrent3 = current3;
      if(current4 >= maxCurrent4)
      maxCurrent4 = current4;
  }  
  if (maxCurrent1 <= 513)
  {
    maxCurrent1 = 512;
  }
  if (maxCurrent2 <= 513)
  {
    maxCurrent2 = 512;
  }
  if (maxCurrent3 <= 513)
  {
    maxCurrent3 = 512;
  }
  if (maxCurrent4 <= 513)
  {
    maxCurrent4 = 512;
  }
  double RMSCurrent1 = ((maxCurrent1 - 512)*0.707)/11.8337;    //Calculates RMS current based on maximum value
  double RMSCurrent2 = ((maxCurrent2 - 512)*0.707)/11.8337;
  double RMSCurrent3 = ((maxCurrent3 - 512)*0.707)/11.8337;
  double RMSCurrent4 = ((maxCurrent4 - 512)*0.707)/11.8337;
  
  int RMSPower1 = 9*RMSCurrent1;    //Calculates RMS Power Assuming Voltage 220VAC, change to 110VAC accordingly
  int RMSPower2 = 9*RMSCurrent2;
  int RMSPower3 = 9*RMSCurrent3;
  int RMSPower4 = 9*RMSCurrent4;
  
  if (RMSPower1 > peakPower1)
  {
    peakPower1 = RMSPower1;
  }
  if (RMSPower2 > peakPower2)
  {
    peakPower2 = RMSPower2;
  }
  if (RMSPower3 > peakPower3)
  {
    peakPower3 = RMSPower3;
  }
  if (RMSPower4 > peakPower4)
  {
    peakPower4 = RMSPower4;
  }
  
  double watt1=(RMSPower1*2.05);
  double watt2=(RMSPower2*2.05);
  double watt3=(RMSPower3*2.05);
  double watt4=(RMSPower4*2.05);

  kiloswatthr1 = kiloswatthr1 + watt1;
  kiloswatthr2 = kiloswatthr2 + watt2;
  kiloswatthr3 = kiloswatthr3 + watt3;
  kiloswatthr4 = kiloswatthr4 + watt4;    //Calculate kilowatt hours used
  
//  kiloswatthr1= kiloswatthr1/3600;
//  kiloswatthr2= kiloswatthr2/3600;
//  kiloswatthr3= kiloswatthr3/3600;
//  kiloswatthr4= kiloswatthr4/3600;

  root["watthr1"] = watt1;
  root["watthr2"] = watt2;
  root["watthr3"] = watt3;
  root["watthr4"] = watt4;
//
//  root["watthr1"] = 101;
//  root["watthr2"] = 202;
//  root["watthr3"] = 303;
//  root["watthr4"] = 404;
  
  if(s.available()>0)
  {
    Serial.println("dent");
    root.printTo(s);
  }
  
  delay (2000);
  Serial.println("\nAnalog Value= "+String(maxCurrent1)+" "+String(maxCurrent2)+" "+String(maxCurrent3)+" "+String(maxCurrent4)  );
  Serial.println("Power Consume= "+String(watt1)+" "+String(watt2)+" "+String(watt3)+" "+String(watt4));
  Serial.print("Current= "+ String(RMSCurrent1)+" "+ String(RMSCurrent2)+" "+ String(RMSCurrent3)+" "+ String(RMSCurrent4));
  Serial.println("A");
  Serial.print("Powr= "+String(RMSPower1)+" "+ String(RMSPower2)+" "+ String(RMSPower3)+" "+ String(RMSPower4));
  Serial.println("W");
  Serial.print("Total Watt Hour= "+String(kiloswatthr1)+" "+ String(kiloswatthr2)+" "+ String(kiloswatthr3)+" "+ String(kiloswatthr4));

  Serial.println("W\n");
}
