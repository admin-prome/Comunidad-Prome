<?php 
include_once "../models/config.php";
?>
<input type="hidden" id="actual_lat" name="latact" />
<input type="hidden" id="actual_lon" name="lonact" />
<input type="hidden" id="actual_direccion"  name="diract" />

<input type="hidden" id="lat" name="lat" value="<?php echo $getlatitud;?>" />
<input type="hidden" id="lon" name="lon" value="<?php echo $getlongitud;?>" />
<input type="hidden" id="dir" name="dir" value="<?php echo $getdireccion;?>" />

<input type="hidden" id="tipovisualizacion" name="tp" value="<?php echo $gettipovisualizacion;?>" >