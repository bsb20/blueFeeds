function writeDate()
{
	var d=new Date();
	var weekday=new Array(7);
	weekday[0]="Sunday";
	weekday[1]="Monday";
	weekday[2]="Tuesday";
	weekday[3]="Wednesday";
	weekday[4]="Thursday";
	weekday[5]="Friday";
	weekday[6]="Saturday";

	var month=new Array(12);
	month[0]="January";
	month[1]="February";
	month[2]="March";
	month[3]="April";
	month[4]="May";
	month[5]="June";
	month[6]="July";					
	month[7]="August";					
	month[8]="September";					
	month[9]="October";					
	month[10]="November";					
	month[11]="December";					

	var x = weekday[d.getDay()];
	var y = month[d.getMonth()];

	var z = x + ", " + y + " " + d.getDate() + "st";
	document.write(x + ", " + y + " " + d.getDate())
	if(d.getDate()==1)
	{
		document.write("st");
	}
	if(d.getDate()==2)
	{
		document.write("nd");
	}					
	if(d.getDate()==3)
	{
		document.write("rd");
	}					
	if(d.getDate()>3)
	{
		document.write("th");
	}
	var x = document.getElementById("date");
	x.innerHTML=z;
}
function writeTime()
{
	var currentTime = new Date()
	var hours = currentTime.getHours()
	var minutes = currentTime.getMinutes()
	if (minutes < 10){
	minutes = "0" + minutes
	}
	if(hours > 11){
	hours-=12
	document.write(hours + ":" + minutes + " ")						
	document.write("PM")
	} else {
	document.write(hours + ":" + minutes + " ")						
	document.write("AM")
	}	
}