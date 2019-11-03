#include <Servo.h>      //including the library of servo motor 
Servo sg90;             //initializing a variable for servo named sg90
int initial_position = 90;   //Declaring the initial position at 90
int LDR1 = A0;          //Pin at which LDR is connected
int LDR2 = A1;          //Pin at which LDR is connected
int voltSensor=A2;
int error = 5;          //initializing variable for error
int servopin=9;
int i=0;


float vout = 0.0;
float vin = 0.0;
float Ra = 30000.0;   
float Rb = 7500.0; 
float value = 0;


void setup() 
{ 

  sg90.attach(servopin);  // attaches the servo on pin 9
  pinMode(LDR1, INPUT);   //Making the LDR pin as input
  pinMode(LDR2, INPUT);
  pinMode(voltSensor, INPUT);
  sg90.write(initial_position);   //Move servo at 90 degree
  delay(2000);  
  Serial.begin(9600);// giving a delay of 2 seconds
}  
 
void loop() 
{ 
  int R1 = analogRead(LDR1); // reading value from LDR 1
  int R2 = analogRead(LDR2); // reading value from LDR 2
  int diff1= abs(R1 - R2);   // Calculating the difference between the LDR's
  int diff2= abs(R2 - R1);

Serial.print("l1= ");
  Serial.println(R1);
  Serial.print("l2 ");
  Serial.println(R2);
  delay(500);
  if((diff1 <= error) || (diff2 <= error)) {
    //if the difference is under the error then do nothing
  } else {    
    if(R1 > R2)
    {
      initial_position = --initial_position;  //Move the servo towards 0 degree
    }
    if(R1 < R2) 
    {
      initial_position = ++initial_position; //Move the servo towards 180 degree
    }
  }
//  Serial.println(i);
//  Serial.println(initial_position);
//  Serial.println(R1);
//  Serial.println(R2);
    sg90.write(initial_position); // write the position to servo
   
     value = analogRead(voltSensor);
   vout = (value * 5.0) / 1024.0; // see text
   vin = vout / (Rb/(Ra+Rb)); 
  // vin=value;
  //vin= map(value,0,1023,0,5);
   
  Serial.print("INPUT V= ");
  Serial.println(vin);
  
  
    delay(100);
}
