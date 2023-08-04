
<style>
    @charset "UTF-8";

@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap');

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Montserrat', sans-serif;
}

a {
  color: #6f6f6f;
  text-decoration: none;
  font-size: 6pt;
}

address {
  font-weight: 100;
  font-size: 8pt;
  line-height: 130%;
  font-style: normal;
}

h1 {
  font-size: 12pt;
  font-weight: 400;
}
h2 {
  font-size: 8pt;
  font-weight: 400;
}
h3 {
  font-size: 8pt;
  font-weight: 300    
}

ul {
  font-family: 'Montserrat', sans-serif;
  color: #58595B;
  text-decoration: none;
  list-style-type: none;
  font-size: 7pt;
  font-weight: 300;
  text-align: left
}

.cert-container {
  position: relative;
  padding: 3px;
  border: 1px solid #6f6f6f;
  width: 384px;
  height: 336px;
  background-image: url(images/mt_icon_grayscale.jpg);
  background-repeat: no-repeat;
  background-size: contain;
  margin: auto;
}

/* Certificate Outer Border (Gray) */
.border-gray {
  padding: 5px;
  border: 3px solid #58595B;
}

/* Certificate Inner Border (red) */
.border-red {
  padding:px;
  border: 3px double #CE202F;
}

.content {
  padding: 20px;
  height: 306px;
  text-align: center;
}

.credentials {
  position: absolute;
  left: 45px;
  top: 260px;  
}

.main-copytext{
  position: absolute;
  left: 45px;
  top: 85px; 
  text-align: left;
  line-height: 50%;
}

.congrats-copytext {
    margin-bottom: 25px;
}

.course-copytext {
    margin-bottom: 22px;
}

.address-copytext {

}

#mt-logo {
  position: absolute;
  width:125px;
  right: 224px;
  top: 33px;
}

#mt-stamp {
  position: absolute;
  width:72px;
  right: 30px;
  top: 234px;
}

#mt-site {
  color: #CE202F;
  font-size: 8pt;
}

#user-id {
    line-height: 10%;
}

#course-id {
    line-height: 10%;
}


@media print {
  @page {
    size: letter landscape;
    margin: 0;
    padding: 0;
  }
    
      .cert-container {
    border: none;
}

/*  
  background-image {
    image-resolution: 300dpi;
    }
*/
}

</style>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Mastery Training Certification</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="cert-wallet-styles.css" rel="stylesheet" type="text/css">

</head>
    
<body>
<div class="cert-container">
  <div class="border-gray">
    <div class="border-red">
      <div class="content">
          <img id="mt-stamp" src="{{asset('logo.png')}}" alt="72px Stamp Here" />
          
 
          
            <div class="main-copytext">
                <div class="congrats-copytext">
                    <h1>Certificate of Completion</h1><br><br><br><br>
                    <h2>Congratulations <span></span> <span></span></h2><br>
                    <h3 id="user-id">Name & Last Name:  {{ $certificate->user->name }}, {{ $certificate->user->prenam }}<span></span></h3><br><br>
                    <h3 id="user-id">Birthday date:{{ $certificate->user->birthday_date  }} <span></span></h3>
                </div>
                
                <div class="course-copytext">

                </div>
                <div class="address-copytext">
                    <address>Quebec Center <br> Tunis  <br> Manouba, 5040</address>
                    <a href="#" id="mt-site"><em>QuebecCenter.tn</em></a>
                </div>
            </div>
      </div>
    </div>
    <button id="downloadButton" class="btn btn-primary">Download PDF</button>

  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>

<script>
    import jsPDF from 'jspdf';

    // Function to generate and download PDF from HTML
    function downloadPDF() {
      // Create a new jsPDF instance
      var doc = new jsPDF();

      // Get the HTML content of the current page
      var htmlContent = document.documentElement.outerHTML;

      // Remove the download button from the HTML content
      htmlContent = htmlContent.replace('<button id="downloadButton">Download as PDF</button>', '');

      // Generate the PDF from the modified HTML content
      doc.html(htmlContent, {
        callback: function () {
          // Save the PDF as a file
          doc.save('document.pdf');
        }
      });
    }

    // Attach a click event listener to the download button
    var downloadButton = document.getElementById('downloadButton');
    downloadButton.addEventListener('click', downloadPDF);
  </script>
</html>
