<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dostupne vakcine</title>
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Izmena vakcine</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="naziv_vakcine">Naziv vakcine:</label>
              <input type="text" class="form-control" id="naziv_vakcine" value='' required>
            </div>
            <div class="form-group">
              <label for="proizvodjac_vakcine">Proizvodjac vakcine:</label>
              <select type="text" class="form-control" id="proizvodjac_vakcine" value='' required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="zakazane_vakcinacije">Zakazane vakcinacije:</label>
                <!-- placeholder/value -->
                <input type="text" id="zakazane_vakcinacije" class="form-control" placeholder="0">
              </div>
            </fieldset>
            <div class="d-grid gap-2">
              <a href='./vakcinacijeZaVakcinu.php' id='zakazaneVakcinacije'><button class="btn btn-warning" type="button"><b>Zakazane vakcinacije</b></button></a>
            </div>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Zatvori</b></button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj"><b>Sacuvaj</b></button>
          <button type='button' class="btn btn-danger" data-dismiss="modal" id="button_delete"><b>Obrisi</b></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Unos nove vakcine</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="naziv_vakcine_dodaj">Naziv vakcine:</label>
              <input type="text" class="form-control" id="naziv_vakcine_dodaj" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="proizvodjac_vakcine_dodaj">Proizvodjac vakcine:</label>
              <select class="form-control" id="proizvodjac_vakcine_dodaj" placeholder="" required>

              </select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="zakazane_vakcinacije_dodaj">Zakazane vakcinacije</label>
                <input type="text" id="zakazane_vakcinacije_dodaj" class="form-control" placeholder="0">
              </div>
            </fieldset>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Zatvori</b></button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_dodaj"><b>Dodaj</b></button>
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
      <br>
        <h1 class='h1_text'>Dostupne vakcine</h1>
       
       <br>
      </div>

      <div class='table_div table-hover'>
        <table class="table">
          <thead  >
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Vakcina</th>
              <th scope="col">Proizvodjac vakcine</th>
              <th scope="col">Zakazane vakcinacije</th>
            </tr>
          </thead>
          <tbody id='vakcine'>


          </tbody>
        </table>
      </div>

      <div class="button_div1">
        <button data-toggle="modal" data-target="#exampleModal" type="button" data-backdrop="static"
          class="btn btn-secondary btn-lg btn-block"><b>NOVA VAKCINA</b></button>
      </div>
 </div>

    <div class='right_div grid-item'>

    </div>

  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script>
    let vakcine = [];
    let proizvodjaci = [];
    let trenutniId = -1;
    $(document).ready(function () {

      ucitajVakcine();
      //console.log(vakcine);
      ucitajProizvodjace();
      console.log(proizvodjaci);


      $('#button_sacuvaj').click(function () {
        if (trenutniId == -1) {
          return;
        }
        //console.log("radi sacuvaj");
        const naziv = $('#naziv_vakcine').val();
        const proizvodjac = $('#proizvodjac_vakcine').val();
        let pattern=new RegExp('(.*[a-z]){2}');
        if(naziv=="" || !pattern.test(naziv))
        {alert('Morate uneti ispravan naziv vakcine. Probajte ponovo.'); return false;}
       
        $.post('../VaccineHandler/update.php', { id: trenutniId, naziv: naziv, proizvodjac:proizvodjac }, function (data) {
          console.log(data);
          if (data != 1) {
            alert(data);
            return;
          }
          ucitajVakcine();
          trenutniId = -1;
        })
      })

      $('#button_delete').click(function () {
        if (trenutniId == -1) {
          return;
        }
        $.post('../VaccineHandler/deleteById.php', { id: trenutniId }, function (data) {
          if (data != 1) {
            console.log(data);
            alert("Ne mozete obrisati vakcinu koja ima zakazane vakcinacije!");
            return;
          }
          console.log({ trenutniId: trenutniId });
          if (data == 1) {
            
            vakcine = vakcine.filter(function (elem) { return elem.id != trenutniId });
            popuniTabelu();
          }

          trenutniId = -1;
        })
      })


      $('#button_dodaj').click(function (e) {
        const naziv = $('#naziv_vakcine_dodaj').val();
        const proizvodjac = $('#proizvodjac_vakcine_dodaj').val();
        
        let pattern=new RegExp('(.*[a-z]){2}');
        if(naziv=="" || !pattern.test(naziv))
        { alert('Morate uneti ispravan naziv vakcine. Pokusajte ponovo.'); return false; }
        if(vakcine.find(x=>x.naziv.toUpperCase()==naziv.toUpperCase())) {alert('Vec postoji vakcina sa datim nazivom!'); return false;}
        $.post('../VaccineHandler/add.php', { naziv: naziv, proizvodjac: proizvodjac }, function (data) {
         console.log(data);
          if (data != 1) {
            alert(data);
            return;
          }
          ucitajVakcine();
        }) 
      })


      $('#exampleModal').on('show.bs.modal', function (e) {

        $('#proizvodjac_vakcine_dodaj').html('');
        for (let proizvodjac of proizvodjaci) {
          $('#proizvodjac_vakcine_dodaj').append(`
            <option value='${proizvodjac.id}'>${proizvodjac.naziv}</option>
          `)
        }
      })



      $('#exampleModal2').on('show.bs.modal', function (e) {

        const button = $(e.relatedTarget);
        const id = button.data('id');
        trenutniId = id;

        $('#proizvodjac_vakcine').html('');
        for (let proizvodjac of proizvodjaci) {
          $('#proizvodjac_vakcine').append(`
            <option value='${proizvodjac.id}'>${proizvodjac.naziv}</option>
          `)
        }

        const vakcina = vakcine.find(function (elem) {
          return elem.id == id;
        });
        if (!vakcina) {
          return;
        }
        $('#zakazaneVakcinacije').attr('href', 'vakcinacijeZaVakcinu.php?id=' + id)
        $('#proizvodjac_vakcine').val(vakcina.proizvodjac);
        $('#naziv_vakcine').val(vakcina.naziv);
        $('#zakazane_vakcinacije').val(vakcina.zakazane_vakcinacije);

        
      })


    })



    function ucitajProizvodjace() {
      $.getJSON('../ManufacturerHandler/getAll.php', function (data) {
      
        if (!data.status) {
          alert(data.greska);
          return;
        }
        proizvodjaci = data.proizvodjaci;

      })
    }

    function ucitajVakcine() {
      $.getJSON('../VaccineHandler/getAll.php', function (data) {
       
        if (!data.status) {
          alert(data.greska);
          return;
        }
        console.log(data.vakcine)
        vakcine = data.vakcine;
        popuniTabelu();
      })
    }


    function popuniTabelu() {
      $('#vakcine').html('');
      let index = 1;
      for (let vakcina of vakcine) {
        $('#vakcine').append(`
          <tr data-toggle="modal" data-target="#exampleModal2" data-id=${vakcina.id} data-backdrop='static' >
              <th scope="row">${index++}</th>
              <td>${vakcina.naziv}</td>
              <td>${vakcina.proizvodjac_vakcine}</td>
              <td>${vakcina.zakazane_vakcinacije}</td>
            </tr>
          `)
      }
    }
  </script>
</body>

</html>