<?php 
session_start();
require("jlpdf.php");

$pdf = new JLPDF('P','mm','Legal');
$pdf->Open();
//$pdf->AliasNbPages();
$pdf->AddPage('P');
$pdf->SetTopMargin(0);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
//$pdf->Image('../img/na.png',54,34,13,20,'PNG');

//recuadro titulo
	$pdf->ln(-8);
	$pdf->Cell(200,10,"",1,1,'',0);
//fin recuadro titulo.

$pdf->ln(-10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(200,5,"CUADRO DEMOSTRATIVO DE RECURSOS Y GASTOS",0,1,'C',0);

//recuadro sector 8
	$pdf->ln(-5);
	$pdf->Cell(195);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(5,5,"8",1,0,'R',0);
//fin sector 8

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("EJERCICIO COMPRENDIDO ENTRE EL 1/5/............. Y EL 30/4/.......... PRESENTADO PARA SU APROBACIÓN EN LA ASAMBLEA"),0,0,'C',0);

//----------------------------------------------------------------------ENTRADAS
$pdf->ln(10);
$pdf->SetFont('Times','UB',10);
$pdf->Cell(100,4,utf8_decode("ENTRADAS"),0,0,'L',0);

$pdf->ln(10);
$pdf->SetFont('Times','UB',8);
$pdf->Cell(100,4,utf8_decode("1. Recursos Propios"),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("a- cuota social ___________________$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("b- donación de dinero _____________$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("c- rifas __________________________$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("d- festivales, actos, quermese _____$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("e- quiosco _________________________$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("f- interés bancario _________________$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("Monto reintegrado por Bco. Pcia ____$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("(Debito, mantenimiento cuenta, etc.)"),0,0,'C',0);

$pdf->ln(5);
$pdf->SetFont('Times','UB',8);
$pdf->Cell(100,4,utf8_decode("2. Recursos Oficiales"),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("a- subsidio de la DGC y E __________$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("b- otros subsidios __________$...................."),0,0,'L',0);

$pdf->ln(10);
$pdf->SetFont('Times','UB',8);
$pdf->Cell(100,4,utf8_decode("3. Otros subsidios"),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("a - (otros)_______________ __________$...................."),0,0,'L',0);


$pdf->ln(15);
$pdf->SetFont('Times','B',10);
$pdf->Cell(100,4,utf8_decode("TOTAL ENTRADAS _______"),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(50);
$pdf->SetFont('Times','B',10);
$pdf->Cell(25,4,utf8_decode("$ 99.999.999,99"),1,0,'C',0);

$pdf->ln(-100);
$pdf->Cell(100,110,'',1,0,'',0); //recuadro para entradas anteriores

//------------------------------------------------------------------RESUMEN ANUAL

$pdf->ln(120);
$pdf->SetFont('Times','UB',8);
$pdf->Cell(100,4,utf8_decode("RESUMEN ANUAL"),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("SALDO EJERCICIO ANTERIOR"),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(50);
$pdf->SetFont('Times','B',10);
$pdf->Cell(25,4,utf8_decode("$ 99.999.999,99"),1,0,'C',0);

$pdf->ln(10);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("TOTAL ENTRADAS _________________$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("TOTAL SALIDAS ___________________$...................."),0,0,'L',0);

$pdf->ln(10);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("SALDO PRÓXIMO EJERCICIO_______"),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(50);
$pdf->SetFont('Times','B',10);
$pdf->Cell(25,4,utf8_decode("$ 99.999.999,99"),1,0,'C',0);

$pdf->ln(10);
$pdf->SetFont('Times','U',8);
$pdf->Cell(100,4,utf8_decode("A- En Banco"),0,0,'L',0);

$pdf->ln(5);
$pdf->Cell(25);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("- Cta. Corriente _____$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->Cell(25);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("- C/ de ahorro _____$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->Cell(25);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("- Plazo fijo _____$...................."),0,0,'L',0);

$pdf->ln(5);
$pdf->Cell(25);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("- Dep. en dólares _____$...................."),0,0,'L',0);

$pdf->ln(10);
$pdf->SetFont('Times','U',8);
$pdf->Cell(100,4,utf8_decode("B- Caja Chica"),0,0,'L',0);

$pdf->ln(5);
$pdf->Cell(25);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("- Dinero en Efectivo _____$...................."),0,0,'L',0);

$pdf->ln(-85);
$pdf->Cell(100,90,'',1,0,'',0); //recuadro para entradas anteriores

//------------------------------------------------------------------COMENTARIO

$pdf->ln(90);
$pdf->SetFont('Times','',6);
$pdf->Cell(100,4,utf8_decode("Punto B) Caja chica del cuadro de saldo que pasa al próximo, Ej., corresponde al resto del dinero de Caja Chica"),0,0,'L',0);

$pdf->ln(3);
$pdf->SetFont('Times','',6);
$pdf->Cell(100,4,utf8_decode("aún no utilizados al cierre del ejercicio. NO al monto total aprobado en Asamblea Anual Ordinaria(…..)"),0,0,'L',0);

$pdf->ln(3);
$pdf->SetFont('Times','',6);
$pdf->Cell(100,4,utf8_decode("Ante la necesidad de USAR RUBRO ESPECIFICAR, Agregando detalle si fuese más de un (1)"),0,0,'L',0);

$pdf->ln(3);
$pdf->SetFont('Times','',6);
$pdf->Cell(100,4,utf8_decode("ITEM OBSERVACIONES _____________________________________________________"),0,0,'L',0);

$pdf->ln(-9);
$pdf->Cell(100,15,'',1,0,'',0); //recuadro para entradas anteriores


//-------------------------------------------REVISORES DE CUENTA
$pdf->ln(20);
$pdf->SetFont('Times','B',8);
$pdf->Cell(200,5,"COMISION REVISORA DE CUENTAS",0,1,'L',0);

//recuadro sector 9
	$pdf->ln(-10);
	$pdf->Cell(195);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(5,5,"9",1,0,'R',0);
//fin sector 9

$pdf->ln(10);
$pdf->Cell(20);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Damos fe que los datos consignados en el cuadro de Recursos y Gastos y en Observaciones, concuerdan con los registrados en el libro de"),0,0,'L',0);

$pdf->ln(5);
$pdf->Cell(20);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Tesorería y con los comprobantes de Ingresos y Egresos por nosotros controlados"),0,0,'L',0);

$pdf->ln(15);
$pdf->Cell(20);
$pdf->SetFont('Times','',8);
$pdf->Cell(70,4,utf8_decode("Firma de Rev. Cuentas Docentes"),'T',0,'C',0);

$pdf->ln(0);
$pdf->Cell(120);
$pdf->SetFont('Times','',8);
$pdf->Cell(70,4,utf8_decode("Firma de Rev. Cuentas Titular"),'T',0,'C',0);

$pdf->ln(-30);
$pdf->Cell(200,35,'',1,0,'',0); //recuadro para entradas anteriores

//-------------------------------------------DATOS DEL BANCO
$pdf->ln(40);
$pdf->SetFont('Times','B',8);
$pdf->Cell(200,5,"Banco con el que opera la Entidad ..............................................................",0,1,'L',0);

$pdf->ln(-5);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,5,"Sucursal ..............................................................",0,1,'L',0);

//recuadro sector 10
	$pdf->ln(-10);
	$pdf->Cell(195);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(5,5,"10",1,0,'R',0);
//fin sector 10

$pdf->ln(10);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Cuenta Corriente N°............................................................."),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Caja de ahorro N°.............................................................."),0,0,'L',0);

$pdf->ln(-35);
$pdf->Cell(200,40,'',1,0,'',0); //recuadro para entradas anteriores

//-------------------------------------------COOPERACION ESCOLAR
$pdf->ln(45);
$pdf->SetFont('Times','B',8);
$pdf->Cell(200,5,"Para uso COOPERACION ESCOLAR",0,1,'L',0);

//recuadro sector 11
	$pdf->ln(-10);
	$pdf->Cell(195);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(5,5,"11",1,0,'R',0);
//fin sector 11

$pdf->ln(15);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Planilla supervisada por agente .........................................................fecha ................... Firma ............................................................."),0,0,'L',0);


$pdf->ln(-15);
$pdf->Cell(200,20,'',1,0,'',0); //recuadro para entradas anteriores

//-------------------------------------------INFORME DEL CONSEJO ESCOLAR
$pdf->ln(25);
$pdf->SetFont('Times','B',8);
$pdf->Cell(200,5,"INFORME DEL CONSEJO ESCOLAR",0,1,'L',0);

//recuadro sector 12
	$pdf->ln(-10);
	$pdf->Cell(195);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(5,5,"12",1,0,'R',0);
//fin sector 12

$pdf->ln(10);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Consta a este Organismo el normal funcionamiento de la entidad"),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Se indica que el establecimiento educativo SI NO tiene QUIOSCO, el cual se ajusta a lo establecido por la Resolución N° 315/89 del Honorable"),0,0,'L',0);

$pdf->ln(5);
$pdf->SetFont('Times','',8);
$pdf->Cell(200,4,utf8_decode("Consejo General de Educación, sus modificatorias y Circulares de la Direccion de Cooperación Escolar"),0,0,'L',0);

$pdf->ln(15);
$pdf->Cell(20);
$pdf->SetFont('Times','',8);
$pdf->Cell(70,4,utf8_decode("Sello"),'T',0,'C',0);

$pdf->ln(0);
$pdf->Cell(120);
$pdf->SetFont('Times','',8);
$pdf->Cell(70,4,utf8_decode("Firma y Sello aclaratorio (Consejo Escolar)"),'T',0,'C',0);

$pdf->ln(3);
$pdf->SetFont('Times','',6);
$pdf->Cell(200,4,utf8_decode("(*)Si el cuadro 4 resulta insuficiente, completar en otra hoja aparte firmada por las autoridades."),0,0,'L',0);

/*$pdf->ln(-15);
$pdf->Cell(200,20,'',1,0,'',0); //recuadro para entradas anteriores
*/

















/*


//------------------------------------------------------------------SALIDAS
$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','UB',10);
$pdf->Cell(100,4,utf8_decode("SALIDAS"),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','UB',8);
$pdf->Cell(100,4,utf8_decode("1. Fondos Propios"),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("a- comestible SAE _________________$...................."),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("b- artículos de limpieza ___________$...................."),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("c- gastos Serv Alim. f/propios ______$...................."),0,0,'L',0);

//renglon
$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','UB',8);
$pdf->Cell(100,4,utf8_decode("2.Gastos para el Alumno"),0,0,'L',0);

//renglon
$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("a- ropa y calzado __________$...................."),0,0,'L',0);

//renglon
$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("b- libros y útiles __________$...................."),0,0,'L',0);

//renglon
$pdf->ln(5);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("c- Combustible y calefacción __________$...................."),0,0,'L',0);

$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("c- excursiones __________$...................."),0,0,'L',0);

//renglon
$pdf->ln(5);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("d- emergencias sanitarias __________$...................."),0,0,'L',0);

//renglon
$pdf->ln(5);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("e- golosinas, premios y medallas __________$...................."),0,0,'L',0);

//renglon
$pdf->ln(5);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("f- (otros) _______________________ __________$...................."),0,0,'L',0);

//renglon
$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','UB',8);
$pdf->Cell(100,4,utf8_decode("3. Gastos para la Escuela"),0,0,'L',0);

//renglon

$pdf->ln(0);
$pdf->Cell(100);
$pdf->SetFont('Times','',8);
$pdf->Cell(100,4,utf8_decode("a-material didáctico __________$...................."),0,0,'L',0);

*/
//------- finalizar y generar
$pdf->Output("Balance_Creado_". date("j, n, Y").'.pdf','I');
$pdf->Close();