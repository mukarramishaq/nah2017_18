<!DOCTYPE html>

<html>
<head>
<style>
* {
    box-sizing: border-box;
}
table{
    font-family: arial, sans-serif;
    font-size:10px;
    width: 100%;
    border-spacing: 0px;
    padding: 10px;
    
}
td {
  padding: 5px;
  border: 1px solid black;

}
/*tr:nth-child(even) {
    background-color: #ddd;
    */

}

body {
    margin: 0;
}
p.small {
    line-height: 1.0;
}
p.big {
    line-height: 1.8;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 30.33%;
    padding: 20px;
    /*height: px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

.image {
     display: inline;

}
</style>
</head>
<body>

<div class="row">
  <div class="column">
      <div>
        <center>Bank Copy</center>
        <br><br>
            <img class = "image" src = "logos/logo_homecoming.jpg" width=50px height=60px align=left>
         <img class = "image" src="logos/logo_nust3.jpeg"  width="50px" height="60px" align="right">
         <br><br>
      </div>
      <br><br>
      <div>
          <center><b>NUST ALUMNI HOMECOMING 2017<br>CHALLAN FORM</b></center>
      </div>
      <div>

      <!--<p class="big" align="justify">-->
      <table>
        <tr>
        <td>HBL ACCOUNT NO.</td> <td><u>123456789</u><br></td>
        </tr>
         <tr>
        <td>Account Title</td> <td><u>Title</u><br></td>
        </tr>
        <tr>
        <td>INVOICE NO.</td><td> <U>{{$chalan_id}}</U><br></td>
        </tr>
        <tr>
        <td>ISSUE DATE</td><td> <U>{{$issue_date}}</U><br></td>
        </tr>
        <tr>
        <td>NAME</td> <td><U>{{$name}}</U><br></td>
        </tr>
        <tr>
        <td>CNIC</td><td> <u>{{$cnic}}</u><br></td>
        </tr>
        <tr>
        <td>SCHOOL</td><td> <u>{{$school}}</u><br></td>
        </tr>
        <tr>
        <td>AMOUNT</td><td> <b><u>{{$amount}} Rs/-</u><br></td></b>
        </tr>
        <tr>
        <td>AMOUNT (IN WORDS)</td><td> <u> Rupees only /-</u><br></td>
        </tr>
      </table>

        <hr>
        DUE DATE: {{$due_date}}<br>
      </p>
      <p class="small">
        <b><u>NOTE FOR BANK:</u><br><br>KINDLY PUNCH THE INVOICE NUMBER IN THE TRASACTION.<br><br></b>
      </p>
      <p class="big">
        CASHIER <U></U><br>
        DATE <U></U><br>
      </p>
        

      </div>
  </div>


  <div class="column">
  <div>
    <center>NUST Copy</center>
    <br><br>
    <img class = "image" src = "logos/logo_homecoming.jpg" width=50px height=60px align=left>
 <img class = "image" src="logos/logo_nust3.jpeg"  width="50px" height="60px" align="right">
 <br><br>
</div>
<br><br>
  <div>
      <center><b>NUST ALUMNI HOMECOMING 2017<br>CHALLAN FORM</b></center>
  </div>
  <div>

  <!--<p class="big" align="justify">-->
  <table>
    <tr>
    <td>HBL ACCOUNT NO.</td> <td><u>123456789</u><br></td>
    </tr>
     <tr>
    <td>Account Title</td> <td><u>Title</u><br></td>
    </tr>
    <tr>
    <td>INVOICE NO.</td><td> <U>{{$chalan_id}}</U><br></td>
    </tr>
    <tr>
    <td>ISSUE DATE</td><td> <U>{{$issue_date}}</U><br></td>
    </tr>
    <tr>
    <td>NAME</td> <td><U>{{$name}}</U><br></td>
    </tr>
    <tr>
    <td>CNIC</td><td> <u>{{$cnic}}</u><br></td>
    </tr>
    <tr>
    <td>SCHOOL</td><td> <u>{{$school}}</u><br></td>
    </tr>
    <tr>
    <td>AMOUNT</td><td> <b><u>{{$amount}} Rs/-</u><br></td></b>
    </tr>
    <tr>
    <td>AMOUNT (IN WORDS)</td><td> <u>-</u><br></td>
    </tr>
  </table>

    <hr>
    DUE DATE: {{$due_date}}<br>
  </p>
  <p class="small">
    <b><u>NOTE FOR BANK:</u><br><br>KINDLY PUNCH THE INVOICE NUMBER IN THE TRASACTION.<br><br></b>
  </p>
  <p class="big">
    CASHIER <U></U><br>
    DATE <U></U><br>
  </p>
    

  </div>
</div>

<div class="column">
<div>
  <center>Alumni Copy</center>
  <br><br>
  <img class = "image" src = "logos/logo_homecoming.jpg" width=50px height=60px align=left>
<img class = "image" src="logos/logo_nust3.jpeg"  width="50px" height="60px" align="right">
<br><br>
</div>
<br><br>
<div>
    <center><b>NUST ALUMNI HOMECOMING 2017<br>CHALLAN FORM</b></center>
</div>
<div>

<!--<p class="big" align="justify">-->
<table>
  <tr>
  <td>HBL ACCOUNT NO.</td> <td><u>123456789</u><br></td>
  </tr>
   <tr>
  <td>Account Title</td> <td><u>Title</u><br></td>
  </tr>
  <tr>
  <td>INVOICE NO.</td><td> <U>{{$chalan_id}}</U><br></td>
  </tr>
  <tr>
  <td>ISSUE DATE</td><td> <U>{{$issue_date}}</U><br></td>
  </tr>
  <tr>
  <td>NAME</td> <td><U>{{$name}}</U><br></td>
  </tr>
  <tr>
  <td>CNIC</td><td> <u>{{$cnic}}</u><br></td>
  </tr>
  <tr>
  <td>SCHOOL</td><td> <u>{{$school}}</u><br></td>
  </tr>
  <tr>
  <td>AMOUNT</td><td> <b><u>{{$amount}} Rs/-</u><br></td></b>
  </tr>
  <tr>
  <td>AMOUNT (IN WORDS)</td><td> <u>  -</u><br></td>
  </tr>
</table>

  <hr>
  DUE DATE: {{$due_date}}<br>
</p>
<p class="small">
  <b><u>NOTE FOR BANK:</u><br><br>KINDLY PUNCH THE INVOICE NUMBER IN THE TRASACTION.<br><br></b>
</p>
<p class="big">
  CASHIER <U></U><br>
  DATE <U></U><br>
</p>
  

</div>
</div>

</div>

</body>
</html>
