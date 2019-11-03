setInterval(function(){
var Gas = document.getElementById("gas");
var Temperature = document.getElementById("temp");
var Smoke = document.getElementById("smoke");
var Shake=	document.getElementById("shake");
var smk=document.getElementById("smokecolor");
var gs=document.getElementById("gascolor");
var skh=document.getElementById("buildingcolor");
var sound=document.getElementById("sound");
var snd=document.getElementById("soundcolor");
var bend=document.getElementById("bend");
var bnd=document.getElementById("bendcolor");



var f1 = firebaseRef = firebase.database().ref().child("LPG").child("lpg0");
f1.on('value',function(datasnapshot){
Gas.innerText = datasnapshot.val();
if(datasnapshot.val()>10)
{Gas.innerText = "Clear Air";
gs.style.backgroundColor="green";}
else if(datasnapshot.val()<10 && datasnapshot.val()>2){
	Gas.innerText = "LPG: 200-300 ppm\n Alkane 500-900ppm";
	gs.style.backgroundColor="red";}
else if(datasnapshot.val()<2 && datasnapshot.val()>1){
	Gas.innerText = "LPG: 500-900 ppm\n Alkane: >1000 ppm \n Carbon Monoxide: 100-700ppm";
gs.style.backgroundColor="red";}
else if(datasnapshot.val()<1 && datasnapshot.val()>0.😎
{Gas.innerText = "LPG: >1000 ppm\n Alkane: >4000 ppm \n Carbon Monoxide: >1000ppm";
gs.style.backgroundColor="red";}
else
{Gas.innerText = "LPG: >10000 ppm\n Alkane: >10000 ppm \n Carbon Monoxide: >1000ppm";
gs.style.backgroundColor="red";}



});



var f2 = firebase.database().ref().child("Smoke").child("smk1");
f2.on('value',function(datasnapshot){
if(datasnapshot.val()<280)
{Smoke.innerText = "No Smoke";
smk.style.backgroundColor="green";}
else if(datasnapshot.val()>279 && datasnapshot.val()<280)
{Smoke.innerText = "Little Bit of Smoke";
smk.style.backgroundColor="red";}
else
{Smoke.innerText = "Severe Smoke";
smk.style.backgroundColor="red";}


});

var f5 = firebase.database().ref().child("Sound").child("value");
f5.on('value',function(datasnapshot){
if(datasnapshot.val()<90)
{sound.innerText = datasnapshot.val()+" DB";
snd.style.backgroundColor="green";}
else if(datasnapshot.val()>85 && datasnapshot.val()<102)
{sound.innerText = datasnapshot.val()+" DB";
snd.style.backgroundColor="yellow";}
else
{sound.innerText = datasnapshot.val()+" DB";
snd.style.backgroundColor="red";}


});
var f6 = firebase.database().ref().child("Bending").child("value");
f6.on('value',function(datasnapshot){
if(datasnapshot.val()<4&&datasnapshot.val()>-1)
{bend.innerText = Math.round(datasnapshot.val())+"\u00b0";
bnd.style.backgroundColor="green";}
else if(datasnapshot.val()>3 && datasnapshot.val()<6)
{bend.innerText = Math.round(datasnapshot.val())+"\u00b0";
bnd.style.backgroundColor="yellow";}
else
{bend.innerText = Math.round(datasnapshot.val())+"\u00b0";
bnd.style.backgroundColor="red";}


});

var f4 = firebase.database().ref().child("Shaking").child("value");
f4.on('value',function(datasnapshot){
if(datasnapshot.val()<0.039)
{
	Shake.innerText="No Shake";
	buildingcolor.style.backgroundColor="green";
}
else if(datasnapshot.val()>0.038 && datasnapshot.val()<0.18)
{
	Shake.innerText="Moderate Shake \n No Potential Damage";
	buildingcolor.style.backgroundColor="yellow";
}
else if(datasnapshot.val()>0.17 && datasnapshot.val()<0.65)
{
	Shake.innerText="Strong Shake \n Moderate Damage";
	buildingcolor.style.backgroundColor="red";
}
else if(datasnapshot.val()>0.66)
{
	Shake.innerText="Extreme Shake \n Heavy Damage";
	buildingcolor.style.backgroundColor="red";
}
else
{
	Shake.innerText="No Shake";
	buildingcolor.style.backgroundColor="green";
}

});

var f3 = firebaseRef = firebase.database().ref().child("Temperature").child("temp0");
f3.on('value',function(datasnapshot){
var far= datasnapshot.val()*1.8 +32;
Temperature.innerText = Math.round(datasnapshot.val())+"\u00b0"+"Celcius\n"+Math.round(far)+"\u00b0"+"Farenheit\n";});}, 3000);
