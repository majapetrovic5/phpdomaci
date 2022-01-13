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



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="naslovModala">Zakazivanje nove vakcinacije</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="ime">Ime:</label>
              <input type="text" class="form-control" id="ime" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="prezime">Prezime:</label>
              <input type="text" class="form-control" id="prezime" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="doza">Doza:</label>
              <input type="text" class="form-control" id="doza" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="datum">Datum:</label>
              <input type="text" class="form-control" id="datum" placeholder="" required>
            </div>

          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj">Sacuvaj</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" hidden id="button_delete">Obrisi</button>
        </div>
      </div>
    </div>
  </div>





  <?php include 'header.php'; ?>
  <div class='centerDiv'>

    <div class='left_div grid-item'>

    </div>

    <div class='middle_div grid-item'>

      <div class='h_div'>
        <h1 class='h1_text' id='vakcina_naziv'>Vakcina:</h1>
    
        <br>
        <hr>
      </div>

      <div class='table_div'>
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
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

      <div class="button_div1">
        <button data-toggle="modal" data-target="#exampleModal" data-id='-1' type="button"
          class="btn btn-secondary btn-lg btn-block" data-backdrop="static">ZAKAZI VAKCINACIJU</button>
      </div>



    </div>

    <div class='right_div grid-item'>
      <input type="text" id='vakcinaId' value="<?php echo $_GET['id']; ?>" hidden>

      </input>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <script>
    let vakcina = undefined;
    let vakcinacije = [];
    let trenutniVakcinacijaId = -1;

    $(document).ready(function () {

      $('#button_sacuvaj').click(function () {
        const ime = $('#ime').val();
        const prezime = $('#prezime').val();
        const doza = $('#doza').val();
        const datum = $('#datum').val();

        if(ime=="" || prezime=="" || doza=="" || datum=="") {alert("Morate popuniti sva polja."); return false;}


        if (trenutniVakcinacijaId == -1) {
          $.post('../VaccHandler/add.php', { vakcina: vakcina.id, ime: ime, prezime: prezime, doza: doza, datum: datum }, function (data) {
            console.log(data);
            vratiVakcinacije();
          })
        } else {
          $.post('../VaccHandler/update.php', { id: trenutniVakcinacijaId, vakcina: vakcina.id,
           ime: ime, prezime: prezime, doza: doza, datum: datum }, function (data) {
            vratiVakcinacije();
          })
        }

      });

      $('#button_delete').click(function () {
        if (trenutniVakcinacijaId == -1) {
          return;
        }
        console.log(trenutniVakcinacijaId);
        $.post('../VaccHandler/deleteById.php', { id: trenutniVakcinacijaId }, function (data) {
          vratiVakcinacije();
        })
      })


      $("#exampleModal").on('show.bs.modal', function (e) {
        const tr = $(e.relatedTarget);
        trenutniVakcinacijaId = tr.data('id');
        if (trenutniVakcinacijaId == -1) {
          $('#naslovModala').html('Zakazivanje vakcinacije');
          $('#button_delete').attr('hidden', true);
          $('#ime').val('');
          $('#prezime').val('');
          $('#doza').val('');
          $('#datum').val('');
        } else {
          const vakcinacija = vakcinacije.find(function (element) { return element.id == trenutniVakcinacijaId });
          $('#naslovModala').html('Izmena zakazane vakcinacije');
          $('#button_delete').attr('hidden', false);
          $('#ime').val(vakcinacija.ime);
          $('#prezime').val(vakcinacija.prezime);
          $('#doza').val(vakcinacija.doza);
          $('#datum').val(vakcinacija.datum);
        }
      })

      const vakcinaId = $('#vakcinaId').val();
      console.log(vakcinaId);
    

      $.getJSON('../VaccineHandler/getById.php', {id: vakcinaId}, function (data) {
        console.log(data);
        if (data.status != 1) {
          alert(data.greska);
          return;
        }
        vakcina = data.vakcina;
    
       
        $('#vakcina_naziv').html('Vakcina: ' + vakcina.naziv);
        vratiVakcinacije();

      }).fail(function(jqxhr, textStatus, error){
        alert(error);
      });
    }) 


    function vratiVakcinacije() {
      $.getJSON('../VaccHandler/getAllByVaccine.php', { id: vakcina.id }, function (data) {
        if (data.status != 1) {
          alert(data.greska);
          return;
        }
        vakcinacije = data.vakcinacije;

        vakcinacije.sort(function (a, b) {
          return a.datum.localeCompare(b.datum);

        })
        
        console.log(vakcinacije);
        napuniTabelu();
      })
    }

    function napuniTabelu() {
      $('#vakcinacije').html('');
      let i = 0;
      for (let vakcinacija of vakcinacije) {
        $('#vakcinacije').append(`
            <tr data-toggle='modal' data-target='#exampleModal' data-id=${vakcinacija.id} data-backdrop='static'>
              <td>${++i}</td>
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