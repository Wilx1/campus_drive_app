<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.angry-grid {
   display: grid; 

   grid-template-rows: 1fr 1fr 1fr;
   grid-template-columns: 1fr 1fr 1fr 1fr;
   
   gap: 10px;
   height: 100%;
   
}
  
#item-0 {

   background-color: #B7BFFC; 
   grid-row-start: 1;
   grid-column-start: 1;

   grid-row-end: 2;
   grid-column-end: 2;
   
}
#item-1 {

   background-color: #A799AA; 
   grid-row-start: 1;
   grid-column-start: 2;

   grid-row-end: 2;
   grid-column-end: 3;
   
}
#item-2 {

   background-color: #6BBD99; 
   grid-row-start: 1;
   grid-column-start: 3;

   grid-row-end: 2;
   grid-column-end: 4;
   
}
#item-3 {

   background-color: #E8B677; 
   grid-row-start: 1;
   grid-column-start: 4;

   grid-row-end: 4;
   grid-column-end: 5;
   
}
#item-4 {

   background-color: #BB8597; 
   grid-row-start: 2;
   grid-column-start: 1;

   grid-row-end: 4;
   grid-column-end: 4;
   
}
</style>
</head>
<body>
    <div class="angry-grid">
    <div id="item-0">&nbsp;</div>
    <div id="item-1">&nbsp;</div>
    <div id="item-2">&nbsp;</div>
    <div id="item-3">&nbsp;</div>
    <div id="item-4">&nbsp;</div>
    </div>
</body>
</html>