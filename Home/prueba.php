<?php 
require("../CRUD/conexion_bd.php");

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

<!DOCTYPE html>
<html>

<head>
    <title>Grafica de Barra y Lineas con PHP y MySQL</title>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <style>
        #chartdiv2 {
            width: 1200px;
            height: 200px;
        }
    </style>
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
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
</head>

<body>
    <div id="chartdiv2"></div>


</body>

</html>