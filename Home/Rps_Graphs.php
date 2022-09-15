<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
if($_SESSION['acceso'] == TRUE && $_SESSION['rol'] == 1){
   }else {
     echo "<script>alert('Ops');
     window.location.href='../Home/Home.php';
     </script>";
  }


 ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="utf-8">
    <script src="../myown.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <title>Usuarios</title>
    <style>
        #chartdiv {
            
            height: 200px;
           

        }
        #chartdiv2 {
            
            height: 200px;
            
        }
    </style>
    
  </head>


  <body>
    <?php

    // -------------------Calling Database connection.-----------------
    include('modal_cambiar_img.php');
    require("../CRUD/conexion_bd.php");
    session_start();


    // ----------------------SQl with the data of the user logged--------------------------
    $query_datos_user="SELECT usuarios.id,usuarios.nombres, usuarios.apellidos,usuarios.img, roles.nombre from usuarios INNER JOIN roles on usuarios.id_rol = roles.id WHERE usuarios.id='".$_SESSION['id']."'";
    $datos_user = mysqli_query($conn, $query_datos_user);
    $row_datos_user = mysqli_fetch_assoc($datos_user);


    // ----------------------SQl with all data of table users--------------------------
    $query_all_users="select usuarios.id, usuarios.nombres,usuarios.apellidos,usuarios.usuario, roles.nombre as rol,usuarios.estado from usuarios INNER JOIN roles on usuarios.id_rol = roles.id";
    $all_users = mysqli_query($conn, $query_all_users);



    $sqlm = "select * from casos where sexo='M'"; // Consulta SQL
    $querym = $conn->query($sqlm); // Ejecutar la consulta SQL

    $sqlf= "select * from casos where sexo='F'"; // Consulta SQL
    $queryf = $conn->query($sqlf); // Ejecutar la consulta SQL
    
    while ($rf = $queryf->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
      $dataf[] = $rf; // Guardar los resultados en la variable $data
    }
    $num_registrosf = count($dataf);

    $data = array(); // Array donde vamos a guardar los datos
    while ($rm = $querym->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
      $datam[] = $rm; // Guardar los resultados en la variable $data
    }
    $num_registrosm = count($datam);



    $sqlANT = "select * from casos where id_tipo_prueba='1'"; // Consulta SQL
    $queryANT = $conn->query($sqlANT); // Ejecutar la consulta SQL

    while ($rmANT= $queryANT->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
      $dataANT[] = $rANT; // Guardar los resultados en la variable $data
    }
    $num_registrosANT = count($dataANT);


    $sqlPCR= "select * from casos where id_tipo_prueba='2'"; // Consulta SQL
    $queryPCR = $conn->query($sqlPCR); // Ejecutar la consulta SQL
    
    while ($rPCR = $queryPCR->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
      $dataPCR[] = $rPCR; // Guardar los resultados en la variable $data
    }
    $num_registrosPCR = count($dataPCR);

    

    ?>
    <div class="container-fluid" >
      <div class="row  " style="
          height: 750px;
      ">
    <!---Barra de la izquierda  ------>
    <?php include('Barra_izquierda.php')  ?>
  <! --- Central--->
        <div class="col-12 col-sm-10 col-md-4 col-lg-9">
          <div class="container mt-5" style="
        width: 100%;">
        <h3 class="m-4"> Generar reportes Estadisticos </h3>
       
          </div>
          <strong><label style="margin-left: 45%;" >Casos M v F</label></strong>
          <div id="chartdiv"style="box-shadow: 2px 2px 5px #999;"></div>
          <strong><label style="margin-left: 45%; margin-top:25px" >Pruebas ANT v PCR</label></strong>
          <div id="chartdiv2"style="box-shadow: 2px 2px 5px #999;"></div>
        </div>
      </div>
    </div>
  </body>
  <script src="../amcharts4/amcharts4/core.js"></script>
  <script src="../amcharts4/amcharts4/charts.js"></script>
  <script src="../amcharts4/amcharts4/themes/animated.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
  
    <script>

        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");
            


            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX"
            }));

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);


            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });
            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "country",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Create series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "country",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5
            });
            series.columns.template.adapters.add("fill", (fill, target) => {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", (stroke, target) => {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });


            // Set data
            var data = [
                 
                 {
                        country: "M",
                        value: <?php  echo $num_registrosm ?>
                    },
                    {
                        country: "F",
                        value:<?php  echo $num_registrosf ?>
                    },
                
            ];

            xAxis.data.setAll(data);
            series.data.setAll(data);



            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);



            var root2 = am5.Root.new("chartdiv2");
  
  // Set themes
  // https://www.amcharts.com/docs/v5/concepts/themes/
  root2.setThemes([
    am5themes_Animated.new(root2)
  ]);
  
  // Create chart
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
  var chart2 = root2.container.children.push(
    am5percent.PieChart.new(root2, {
      endAngle: 270
    })
  );
  
  // Create series
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
  var series2 = chart2.series.push(
    am5percent.PieSeries.new(root2, {
      valueField: "value",
      categoryField: "category",
      endAngle: 270
    })
  );
  
  series2.states.create("hidden", {
    endAngle: -90
  });
  
  // Set data
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
  series2.data.setAll([{
                        category: "PCR",
                        value: <?php  echo $num_registrosPCR ?>
                    },
                    {
                        category: "ANT",
                        value:<?php  echo $num_registrosANT ?>
                    },]);
  
  series2.appear(1000, 100);
            


        }); // end am5.ready()
    </script>


</html>
