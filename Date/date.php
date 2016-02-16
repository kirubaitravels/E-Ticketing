<!DOCTYPE html>
<html>
<head>
<title>SlimPicker Demo Page</title>
<link rel="stylesheet" href="pagestyle.css" media="screen, projection" />
<link rel="stylesheet" href="slimpicker.css" media="screen, projection" />
<script src="mootools-1.2.4-core-yc.js"></script>
<script src="mootools-1.2.4.4-more-yc.js"></script>
<script src="slimpicker.js"></script>
</head>

<body>

<div class="container">






<p>
<label for="birthday">calendar with options</label>
<input id="birthday" name="birthday" type="text" class="slimpicker" autocomplete="off" alt="{
dayChars:3,
dayNames:['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
daysInMonth:[31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
format:'yyyy-mm-dd',
monthNames:['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
startDay:1,
yearOrder:'desc',
yearRange:90,
yearStart:2007
}" value="1980-03-13" />
</p>

</div>

<script>

$$('input.slimpicker').each( function(el){
var picker = new SlimPicker(el);
});

</script>

</body>

</html>