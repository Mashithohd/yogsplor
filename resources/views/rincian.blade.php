<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Untuk icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
    .catatan-2 {
  background-color: #436850;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 50px 0 49px 0;
  width: 1440px;
  box-sizing: border-box;
}

.container {
  border-radius: 17px;
  background-color: #FBFADA;
  position: relative;
  margin: 0 0 31px 0;
  display: flex;
  flex-direction: column;
  padding: 42px 0 242px 45.2px;
  width: fit-content;
  box-sizing: border-box;
}

.rundown {
  margin: 0 0 55px 185.1px;
  display: inline-block;
  align-self: center;
  font-family: 'Inter', sans-serif;
  font-style: italic;
  font-weight: normal;
  font-size: 30px;
  color: #000000;
}

.day {
  display: inline-block;
  align-self: start;
  font-family: 'Inter', sans-serif;
  font-style: italic;
  font-weight: bold;
  font-size: 15px;
  color: #000000;
}

.day-1, .day-2 {
  margin: 0 1.3px 201px 1.3px;
}

.day-3 {
  margin: 0 0.2px 201px 0.2px;
}

.container-1 {
  margin: 0 0 0 1px;
  display: flex;
  flex-direction: row;
  gap: 0 38.2px;
  width: 530px;
  box-sizing: border-box;
}

.button {
  border-radius: 37px;
  background-color: #FBFADA;
  position: relative;
  display: flex;
  padding: 23px 1px 22px 0;
  width: 206px;
  box-sizing: border-box;
  font-family: 'Inter', sans-serif;
  font-style: italic;
  font-weight: normal;
  font-size: 15px;
  color: #000000;
  text-align: center;
  justify-content: center;
  align-items: center;
}

.home {
  margin: 14.3px 0 13.3px 0;
  display: flex;
  width: 41.7px;
  height: 35.4px;
  box-sizing: border-box;
}

.vector {
  width: 41.7px;
  height: 35.4px;
}

</style>

<head>
    <body>
    <div class="catatan-2">
  <div class="container">
    <div class="rundown">RUNDOWN</div>
    <div class="day day-1">DAY 1</div>
    <div class="day day-2">DAY 2</div>
    <div class="day day-3">DAY 3</div>
  </div>
  <div class="container-1">
    <div class="button back">back</div>
    <div class="home">
      <img class="vector" src="../assets/vectors/vector_x2.svg" />
    </div>
    <div class="button selesai">selesai</div>
  </div>
</div>

    </body>
</head>