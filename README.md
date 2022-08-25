# Prome - Provincia MicroCreditos

Proyecto para mostrar los comercios que tienen prestamos con Provincia MicroCreditos

# Configuración de Proyecto en el Servidor

## 1.- Configuración de Base de Datos

Se debe crear la base de datos, usuario y clave.
Los datos se encuentran en el siguiente archivo del directorio: 

### models/config.php

Se deben editar los siguientes valores: 

define("servidor", "localhost"); // Servidor Base de Datos <br>
define("basededatos", "prome"); // Nombre de Base de Datos <br>
define("usuario", "prome"); // Usuario de Base de Datos <br>
define("clave", "prome"); // Clave de Usuario de Base de Datos <br>


## 2.- Importar Base de Datos

Se debe importar la base de datos, el respaldo se encuentra en el siguiente directorio: bd/prome.sql


# Información de Base de Datos

A continuación se explica la estructura de la base de datos para cargar correctamente la información:

## Tablas

### Tabla: comercio
Es la tabla principal del sistema ya que en esta se guardan todos los comercios que son visibles dentro del proyecto.

id: (Es el codigo autoincrementable)<br>
direccion: (Es la dirección que se muestra en el comercio)

coordenadas: (Este campo es un tipo de dato POINT)<br>
    Ejemplo de editar este campo:<br>
    UPDATE comercio SET coordenadas = 'POINT(-34.6045816 -58.3789308)',0 WHERE id = 0<br>

    El primer valor es la latitud
    El segund valor es la longitud

rubro_id: (Es el id que hace relación de la tabla "rubro")

actividad_id: (Es el id que hace relación de la tabla "actividad")

municipio_id: (Es el id que hace relación de la tabla "municipio")

facebookurl: (Es la url del facebook del comercio)<br>
    Ejemplo:<br>
    https://www.facebook.com/miempresa

facebooknombre: (Es el nombre que va a ser visible en la vista del comercio)<br>
    Ejemplo:<br>
    Mi Empresa

instagram: (Es el usuario de instagram del comercio)<br>
    Ejemplo:<br>
    MiEmpresa

web: (Es la dirección web del comercio)

whatsapp: (Es el whatsapp del comercio, colocar sin el simbolo + y sin espacios, todo el numero junto)

telefono: (Es el telefono del comercio, colocar sin el simbolo + y sin espacios, todo el numero junto)

email: (Es el email del comercio)

cuentadni: (Se coloca los siguientes valores:)<br>
    1 = Si tiene cuenta dni<br>
    0 = No tiene cuenta dni

haceenvios: (Se coloca los siguientes valores:)<br>
    1 = Si hace envíos<br>
    0 = No hace envíos

estatus_id: (Es el iid estatus del comercio para el sistema)<br>
    Los valores son los que se encuentran en la tabla "estatus"<br>
    Ejemplo:<br>
    1 = Activado<br>
    2 = Pendiente de Activar

activo: <br>
    1 = Activo en el sistema<br>
    0 = Inactivo en el sistema

eliminado: <br>
    1 = Eliminado para que no se muestre en el sistema<br>
    0 = NO Eliminado en el sistema



### Tabla: estatus
Son los diferentes estatus que se manejan dentro del sistema, para los dos procesos.

tipoestatus_id:<br>
    1 = Estatus del Comercio<br>
    2 = Estatus del Formulario

visibleresultado:<br>
    1 = Es visible para mostrarse en el listado dentro de la web.        


### Tabla: formulario
Son los formularios recibidos dentro del sistema

tipoformulario_id: (Es para identificar de cual opcion fue recibido el formulario)<br>
    1 = Alta<br>
    2 = Baja<br>
    3 = Modificacion

documento: (Es el numero de documento introducido en el formulario)

mensaje: (Es el mensaje introducido en el formulario)

estatus_id: (Es el id del estatus del formulario, esto para cambiar el estatus del formulario para saber si ya se proceso o no)<br>
    4 = Pendiente de Revision<br>
    5 = Aprobado<br>
    6 = Rechazado

    Cuando se recibo un nuevo formulario dentro del sistema se crea con un estatus inicial en 4.


### Tabla: rubro
Son los rubros que se tienen en el sistema para relacionar al comercio


### Tabla: rubrobusqueda
Son las palabras que se tienen en el sistema para relacionar en la busqueda las palabras claves para relacionar al rubro.<br>
    Ejemplo:<br>
    Rubro: Ropa<br>
    Palabras Clave:<br>
        Camisa<br>
        Pantalon<br>
        Zapatos.

### Tabla: actividad
Son las actividades que se tienen en el sistema para relacionar al comercio
      
### Tabla: municipio
Son los municipios que se tienen en el sistema para relacionar al comercio en el municipio, esto en el caso de que el usuario no tenga dirección dentro del mapa.


      
