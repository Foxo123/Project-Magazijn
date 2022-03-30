
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>pdo</title>
    <style>
        #select {
            padding-top: 1.5rem;
        }

        #submit {
            padding-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="container" style="padding-top: 25px;">
        <h1> Artikel updaten </h1>
        <div class="row">
            <div class="col-12">
                <form action="<?= URLROOT ?>/artikel/update_script" method="post">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Omschrijving</label>
                        <textarea class="form-control" name="omschrijving" ><?=$data['info']->omschrijving?></textarea>

                        <label class="form-label">Aantal</label>
                        <input type="number" class="form-control" min="1" max="9999" name="aantal" value=<?=$data['info']->aantal?>>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Category</label>
                        <select class="form-select" aria-label="Category" name="category">
                        <option selected>Select a Category</option>
                        <?=$data['selector']?>
                        </select>
                        <div id="select">
                            <label class="form-label">Locatie (klaslokaal)</label>
                            <input type="text" class="form-control" aria-label="Category" name="locatie" value=<?=$data['info']->locatie ?>>
                        </div>
                    </div>
                </div>
                <label class="form-label">Kosten</label>
                <input type="number" name="kosten" min="0.00" max="9999.99" class="form-control" value=<?=$data['info']->kosten?>>

                <div id="submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <input type="hidden" name="id" value=<?=$data['info']->artikelid?>>
                </form>

            </div>
            <a href="<?= URLROOT; ?>/artikel/read" style="padding-top: 10px;"><button type="button" class="btn btn-secondary">Go to read.php</button></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>