<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zakazane vakcinacije</title>
  <link rel="stylesheet" href="global.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>


<body>

  <?php include 'header.php'; ?>
  <div class='centerDiv'>

    <div class='left_div grid-item'>

    </div>

    <div class='middle_div grid-item'>

      <div class='h_div'>
        <h1 class='h1_text'>Zakazane vakcinacije</h1>

        <br>
        <hr>
      </div>
      <div class="row">
        <div class="col-3">
          <label>Sortiraj po datumu</label>
          <select id='sortiraj' class='form-control'>
            <option value="asc">Najskorije</option>
            <option value="desc">Najudaljenije</option>
          </select>
          </div> 
      <div class="col-3">
          <label>Pretrazi po datumu</label>
          <input id='pretrazidatum' class='form-control' onkeyup='pretraziPoDatumu()'>
              
        </div>
        <div class="col-3">
          <label>Pretrazi po dozi</label>
          <input id='pretrazidoza' class='form-control' onkeyup='pretraziPoDozi()'>
              
        </div>
      </div>
      <div class='table_div'>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Vakcina</th>
              <th scope="col">Ime</th>
              <th scope="col">Prezime</th>
              <th scope="col">Doza</th>
              <th scope="col">Datum</th>
            </tr>
          </thead>
          <tbody id='vakcinacije'>

          </tbody>
        </table>
      </div>



    </div>



  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>

    let vakcinacije = [];
    let pretraga =[];

    $(document).ready(function () {

      
      $('#sortiraj').change(function () {
        const option = $('#sortiraj').val();
        if (option === 'asc') {
          vakcinacije.sort(function (a, b) {
            return a.datum.localeCompare(b.datum);

          })
        } else {
          vakcinacije.sort(function (a, b) {
          
            return b.datum.localeCompare(a.datum);
          })
        }

        napuniTabelu(vakcinacije);
      })


      $.getJSON('../VaccHandler/getAll.php', function (data) {
        console.log(vakcinacije);
        if (!data.status) {
          alert(data.greska);
          return;
        }
        vakcinacije = data.vakcinacije;
        pretraga=data.vakcinacije;
        
        vakcinacije.sort(function (a, b) {
          return a.datum.localeCompare(b.datum);

        })

        napuniTabelu(vakcinacije);
      }).fail(function(jqxhr, textStatus, error){
        alert(error);
      });

    })

    function pretraziPoDatumu(){
       
      input = document.getElementById("pretrazidatum");
      filter = input.value;
      pretraga=vakcinacije;
      if(filter!="") {
      pretraga = vakcinacije.filter(function (elem) { return elem.datum == filter}); }
      napuniTabelu(pretraga);
       
      }


      function pretraziPoDozi(){
       
       input = document.getElementById("pretrazidoza");
       filter = input.value;
       pretraga=vakcinacije;
       if(filter!="") {
       pretraga = vakcinacije.filter(function (elem) { return elem.doza == filter}); }
       napuniTabelu(pretraga);
        
       }


    function napuniTabelu(niz) {
      $('#vakcinacije').html('');
      let i = 0;
      for (let vakcinacija of niz) {
        $('#vakcinacije').append(`
            <tr>
              <td>${++i}</td>
              <td>${vakcinacija.vakcina_naziv}</td>
              <td>${vakcinacija.ime}</td>
              <td>${vakcinacija.prezime}</td>
              <td>${vakcinacija.doza}</td>
              <td>${vakcinacija.datum}</td>
            </tr>
          `)
      }
    }
  </script>
</body>

</html>