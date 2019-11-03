#include <Servo.h>
const int trigPin1 = 2;
const int echoPin1 = 3;
const int trigPin2 = 4;
const int echoPin2 = 5;
const int trigPin3 = 6;
const int echoPin3 = 7;

const int led1 = 11 ;
const int led2 = 12;
const int led3 = 13;

const int s1 = 8;
const int s2 = 9;
const int s3 = 10;

// defining time and distance
long duration;
int distance1,distance2,distance3,distance4,distance5;

Servo myServo1;
Servo myServo2;
Servo myServo3;

void setup() {
pinMode(trigPin1, OUTPUT);
pinMode(trigPin2, OUTPUT);
pinMode(trigPin3, OUTPUT);

pinMode(led1, OUTPUT);
pinMode(led2, OUTPUT);
pinMode(led3, OUTPUT);

pinMode(echoPin1, INPUT);
pinMode(echoPin2, INPUT);
pinMode(echoPin3, INPUT);

Serial.begin(9600);
myServo1.attach(s1); 
myServo2.attach(s2); 
myServo3.attach(s3); 
}
void loop() {
// rotating servo i++ depicts increment of one degree

int islit1=310;
int islit2=310;
int islit3=310;
for(int i=15;i<=165;i+=6){
    myServo1.write(i);
    myServo2.write(i);
    myServo3.write(i);
    
    delay(30);
    distance1 = calculateDistance(i,1);
    distance2 = calculateDistance(i,2);
    distance3 = calculateDistance(i,3);
    
    Serial.print(i);
    Serial.print("=");
    Serial.print(String(distance1)+" "+String(distance2)+" "+String(distance3)+"\n");
    
    if(distance1<3)
    {
      //Serial.println(String(distance2)+"  "+ "   ");
      islit1=1;
      digitalWrite(led1, HIGH);
    }
    else 
    {
      islit1++;
    }
    
    if(distance2<10)
    {
      //Serial.println("  "+String(distance2)+ "   ");
      islit2=1;
      digitalWrite(led2, HIGH);
    }
    else 
    {
      islit2++;
    }
    if(distance3<10)
    {
      //Serial.println("        "+ String(distance3));
      islit3=1;
      digitalWrite(led3, HIGH);
    }
    else 
    {
      islit3++;
    }
    

    if(islit1>=400)
      {
          digitalWrite(led1, LOW);
      }
      if(islit2>=400)
      {
          digitalWrite(led2, LOW);
      }
      if(islit3>=400)
      {
          digitalWrite(led3, LOW);
      } 
      
     

}
// Repeats the previous lines from 165 to 15 degrees
for(int i=165;i>15;i-=6){
     myServo1.write(i);
    myServo2.write(i);
    myServo3.write(i);
    
    
    delay(30);
    distance1 = calculateDistance(i,1);
    distance2 = calculateDistance(i,2);
    distance3 = calculateDistance(i,3);
    
    
    Serial.print(i);
    Serial.print("=");
    Serial.print(String(distance1)+" "+String(distance2)+" "+String(distance3)+"\n");
    
    if(distance1<6)
    {
      Serial.println(String(distance2)+"  "+ "   ");
      islit1=1;
      digitalWrite(led1, HIGH);
    }
    else 
    {
      islit1++;
    }
    if(distance2<10)
    {
      Serial.println("  "+String(distance2)+ "   ");
      islit2=1;
      digitalWrite(led2, HIGH);
    }
    else 
    {
      islit2++;
    }
    if(distance3<10)
    {
      Serial.println("        "+ String(distance3));
      islit3=1;
      digitalWrite(led3, HIGH);
    }
    else 
    {
      islit3++;
    }
    

    if(islit1>=400)
      {
          digitalWrite(led1, LOW);
      }
      if(islit2>=400)
      {
          digitalWrite(led2, LOW);
      }
      if(islit3>=400)
      {
          digitalWrite(led3, LOW);
      }
    
}

if(islit1>=300)
{
    digitalWrite(led1, LOW);
}
else 
{
    digitalWrite(led1, HIGH);
}
if(islit2>=300)
{
    digitalWrite(led2, LOW);
}
else 
{
    digitalWrite(led2, HIGH);
}
if(islit3>=300)
{
    digitalWrite(led3, LOW);
}
else 
{
    digitalWrite(led3, HIGH);
}



}
int calculateDistance(int i, int flg){

int trigPin,echoPin;
int distanceCm;

if(flg==1)
{
  trigPin=trigPin1;
  echoPin=echoPin1;
}
else if(flg==2)
{
  trigPin=trigPin2;
  echoPin=echoPin2;
}
else if(flg==3)
{
  trigPin=trigPin3;
  echoPin=echoPin3;
}

digitalWrite(trigPin, LOW);
i=i+1;
myServo1.write(i);
myServo2.write(i);
 myServo3.write(i);

 
  delayMicroseconds(2);
  i=i+1;
myServo1.write(i);

 myServo2.write(i);
 myServo3.write(i);

  digitalWrite(trigPin, HIGH);
  i=i+1;
myServo1.write(i);

 myServo2.write(i);
 myServo3.write(i);

  delayMicroseconds(10);
  i=i+1;
myServo1.write(i);
myServo2.write(i);
 myServo3.write(i);

 
  digitalWrite(trigPin, LOW);
  i=i+1;
  myServo1.write(i);  
myServo2.write(i);
 myServo3.write(i);

 
  duration = pulseIn(echoPin, HIGH);
  i=i+1;
myServo1.write(i);
myServo2.write(i);
 myServo3.write(i);

 
  distanceCm = duration * 0.0340 / 2;
  return distanceCm;

  
}
