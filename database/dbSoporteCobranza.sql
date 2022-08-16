CREATE DATABASE alexander;
USE alexander;

CREATE TABLE roles(
idRol   int(255) auto_increment not null,
nombre  varchar(255) not null,
CONSTRAINT pk_roles PRIMARY KEY (idRol)
)ENGINE=InnoDb;

CREATE TABLE tipo_documentos(
idTipoDocumento  int(255) auto_increment not null,
nombre  varchar(255) not null,
codigoDocumento varchar(255) not null,
CONSTRAINT pk_tipo_documentos PRIMARY KEY (idTipoDocumento)
)ENGINE=InnoDb;

CREATE TABLE permisos(
idPermiso  int(255) auto_increment not null,
nombrePermiso  varchar(255) not null,
codPermiso     varchar(255) not null,
CONSTRAINT pk_permisos PRIMARY KEY (idPermiso)
)ENGINE=InnoDb;

CREATE TABLE departamentos(
idDepartamento  int(255) auto_increment not null,
nombrePermiso  varchar(255) not null,
CONSTRAINT pk_departamentos PRIMARY KEY (idDepartamento)
)ENGINE=InnoDb;

CREATE TABLE provincias(
idProvincia  int(255) auto_increment not null,
nombrePermiso  varchar(255) not null,
CONSTRAINT pk_provincias PRIMARY KEY (idProvincia)
)ENGINE=InnoDb;

CREATE TABLE distritos(
idDistrito  int(255) auto_increment not null,
nombrePermiso  varchar(255) not null,
CONSTRAINT pk_distritos PRIMARY KEY (idDistrito)
)ENGINE=InnoDb;

CREATE TABLE serv_categorias(
  idServCategoria   int(255) auto_increment PRIMARY KEY,
  nombreCategoria   varchar(255) not null,
  estado            varchar(255) not null
)ENGINE=InnoDb;

CREATE TABLE procesos(
  idProceso   int(255) auto_increment PRIMARY KEY,
  nombreProceso   varchar(255) not null,
  estado            varchar(255)
)ENGINE=InnoDb;

CREATE TABLE estados(
  idEstado   int(255) auto_increment PRIMARY KEY,
  nombreEstado   varchar(255) not null,
  estado            varchar(255)
)ENGINE=InnoDb;

CREATE TABLE unidad_medida(
  idUnidadMedida int(11) auto_increment PRIMARY KEY,
  codigo_unimed varchar(50) not null,
  descripcion_undmed text not null,
  estado varchar(50) not null
)ENGINE=InnoDb;

CREATE TABLE tipoafectacion_igv(
  idafectacionigv int(11) auto_increment  PRIMARY KEY,
  codigo_igv int(11) not null,
  descripcion text not null,
  codigotributo varchar(50) not null,
  estado varchar(50) not null
)ENGINE=InnoDb;

CREATE TABLE currency(
  idcurrency int(11) PRIMARY KEY auto_increment,
  currencyISO varchar(10) not null,
  lenguaje varchar(10) not null,
  nombreCurrency varchar(50) not null,
  moneda varchar(50) not null,
  simbolo varchar(10) not null
)ENGINE=InnoDb;

CREATE TABLE datos_empresa(
  idDatosEmpresa        int(255) auto_increment PRIMARY KEY,
  nombreEmpresa         varchar(255) not null,
  propietario           varchar(255) not null,
  numeroNit             varchar(255) not null,
  numeroRuc             varchar(255) not null,
  porcentajeIVA         varchar(255) not null,
  porcentajeRetencion   varchar(255) not null,
  montoRetencion        varchar(255) not null,
  direccionEmpresa      varchar(255) not null,
  logoEmpresa           varchar(255) not null,
  idcurrency            int(11) not null,
  FOREIGN KEY (idcurrency) REFERENCES currency(idcurrency)
)ENGINE=InnoDb;

CREATE TABLE sucursales(
  idSucursal        int(255) auto_increment PRIMARY KEY,
  codigoSucursal    varchar(255) not null,
  nombre            varchar(255) not null,
  direccion         varchar(255) not null,
  codigoFiscal      varchar(255) not null,
  estado            varchar(255) not null,
  idDatosEmpresa    int(11) not null,
  FOREIGN KEY(idDatosEmpresa) REFERENCES datos_empresa(idDatosEmpresa)
)ENGINE=InnoDb;

CREATE TABLE comprobantes(
  idComprobante int(255) auto_increment PRIMARY KEY,
  nombreComprobante varchar(255) not null
)ENGINE=InnoDb;

CREATE TABLE tirajes(
  idTiraje            int(255) auto_increment PRIMARY KEY,
  fechaResolucion     varchar(255) not null,
  nroResolucion       varchar(255) not null,
  serie               varchar(255) not null,
  desde               varchar(255) not null,
  hasta               varchar(255) not null,
  idComprobante       int(255) not null,
  disponible          varchar(255) not null,
  idSucursal          int(255) not null,
  FOREIGN KEY(idSucursal) REFERENCES sucursales(idSucursal),
  FOREIGN KEY(idComprobante) REFERENCES comprobantes(idComprobante)
)ENGINE=InnoDb;

CREATE TABLE usuarios(
idUsuario         int(255) auto_increment PRIMARY KEY,
nombre            varchar(100) not null,
apellido          varchar(255) not null,
idTipoDocumento   int(11) not null,
nroDocumento      varchar(255) not null,
celular           varchar(13) not null,
direccion         varchar(255) not null,
idRol             int(11) not null,
estado            varchar(50) not null, 
email             varchar(255) not null UNIQUE,
contrasena        varchar(255) not null,
imagen            varchar(255),
FOREIGN KEY(idTipoDocumento) REFERENCES tipo_documentos(idTipoDocumento),
FOREIGN KEY(idRol) REFERENCES roles(idRol)
)ENGINE=InnoDb;

CREATE TABLE cajas(
  idCaja int(255) auto_increment PRIMARY KEY,
  fechaApertura   DATETIME DEFAULT CURRENT_TIMESTAMP, 
  montoApertura   decimal(10,2) not null,
  montoCierre     decimal(10,2) not null,
  estado          varchar(255) not null,
  idUsuario       int(11) not null,
  idSucursal      int(11) not null,
  FOREIGN KEY(idUsuario) REFERENCES usuarios(idUsuario),
  FOREIGN KEY(idSucursal) REFERENCES sucursales(idSucursal)
)ENGINE=InnoDb;

CREATE TABLE caja_movimiento(
  idCajaMovimiento        int(255) auto_increment PRIMARY KEY,   
  idCaja                  int(255) not null,
  montoMovimiento         decimal(10,2) not null,
  descripcionMovimiento   text not null,
  fechaMovimiento         DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(idCaja) REFERENCES cajas(idCaja)
)ENGINE=InnoDb;

CREATE TABLE serv_proveedores(
  idServProveedores int(11) auto_increment PRIMARY KEY,
  codProveedor varchar(255) not null,
  nombreProveedor varchar(255) not null,
  telfProveedor varchar(13) not null,
  emailProveedor varchar(255),
  direccionProveedor varchar(255) not null,
  idTipoDocumento int(11) not null,
  nroDocumento  int(11) not null,
  nombreContacto varchar(255) not null,
  telfContacto varchar(13) not null,
  emailContacto varchar(255) not null,
  estado varchar(50) not null,
  FOREIGN KEY (idTipoDocumento) REFERENCES tipo_documentos(idTipoDocumento)
)ENGINE=InnoDb;

CREATE TABLE usuarios_permisos(
  idUsuarioPermiso int(11) auto_increment PRIMARY KEY,
  idUsuario int(11) not null,
  idPermiso int(11) not null,
  estado varchar(50) not null,
  FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
  FOREIGN KEY (idPermiso) REFERENCES permisos(idPermiso)
)ENGINE=InnoDb;

CREATE TABLE clientes(
  idCliente int(11) auto_increment PRIMARY KEY,
  codCliente  varchar(100) not null,
  nombreCliente varchar(255) not null,
  celularCliente varchar(13) not null,
  telefonoCliente varchar(10) not null,
  emailCliente varchar(255) not null,
  direccionCliente varchar(255) not null,
  idDepartamento int(11) not null,
  idProvincia int(11) not null,
  idDistrito int(11) not null,
  idTipoDocumento int(11) not null,
  nroDocumento varchar(11) not null,
  nombreContacto varchar(255) not null,
  nroContacto varchar(13) not null,
  estado varchar(50) not null,
  FOREIGN KEY (idDepartamento) REFERENCES departamentos(idDepartamento),
  FOREIGN KEY (idProvincia) REFERENCES provincias(idProvincia),
  FOREIGN KEY (idDistrito) REFERENCES distritos(idDistrito),
  FOREIGN KEY (idTipoDocumento) REFERENCES tipo_documentos(idTipoDocumento)
)ENGINE=InnoDb;

CREATE TABLE servicios(
  idServicio int(11) auto_increment PRIMARY KEY,
  codInterno varchar(255) not null,
  nombreServicio varchar(255) not null,
  precio decimal(10,2) not null,
  idServProveedores int(11),
  idServCategoria int(11) not null,
  idUnidadMedida int(11) not null,
  FOREIGN KEY (idServProveedores) REFERENCES serv_proveedores(idServProveedores),
  FOREIGN KEY (idServCategoria) REFERENCES serv_categorias(idServCategoria),
  FOREIGN KEY (idUnidadMedida) REFERENCES unidad_medida(idUnidadMedida)
)ENGINE=InnoDb;

CREATE TABLE clientes_servicios(
  idClienteServicio int(11) auto_increment PRIMARY KEY,
  fechaRegistro DATETIME DEFAULT CURRENT_TIMESTAMP, 
  fechaInicioServicio DATETIME,
  idServicio int(11) not null,
  idCliente int(11) not null,
  idUsuario int(11) not null,
  idafectacionigv int(11),
  FOREIGN KEY (idServicio) REFERENCES servicios(idServicio),
  FOREIGN KEY (idCliente) REFERENCES clientes(idCliente),
  FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
  FOREIGN KEY (idafectacionigv) REFERENCES tipoafectacion_igv(idafectacionigv)
)ENGINE=InnoDb;

CREATE TABLE tickets_soporte(
  idTicket int(11) auto_increment PRIMARY KEY,
  idUsuarioRegistra int(11) not null,
  idProceso int(11) not null,
  idCliente int(11) not null,
  descripcion text not null,
  fechaRegistro date not null,
  fechaInicio date not null,
  fechaCulminacion date not null,
  idEstado int(11) not null,
  horaRegistro time not null,
  horaInicio time not null,
  horaCulminacion time not null,
  idUsuarioRealiza int(11) not null,
  imagenUrl varchar(255) not null,
  idClienteServicio int(11) not null,
  FOREIGN KEY (idUsuarioRegistra) REFERENCES usuarios(idUsuario),
  FOREIGN KEY (idProceso) REFERENCES procesos(idProceso),
  FOREIGN KEY (idCliente) REFERENCES clientes(idCliente),
  FOREIGN KEY (idEstado) REFERENCES estados(idEstado),
  FOREIGN KEY (idUsuarioRealiza) REFERENCES usuarios(idUsuario),
  FOREIGN KEY (idClienteServicio) REFERENCES clientes_servicios(idClienteServicio)
)ENGINE=InnoDb;

CREATE TABLE detalle_pensiones(
  idDetallePensiones int(11) PRIMARY KEY auto_increment,
  idClienteServicio int(11) not null,
  fechaPago DATETIME,
  fechaVencimiento DATETIME,
  fechaPagoRealizado DATETIME,
  fechaRegistro DATETIME,
  detallePago text,
  tipoPago varchar(255),
  serieComprobante varchar(50),
  numeroComprobante varchar (255),
  tipoComprobante varchar(255),
  precioSinIGV decimal(10,2),
  montoIGV decimal(10,2),
  exento decimal(10,2),
  retenido decimal(10,2),
  descuento decimal(10,2),
  totalPagar decimal(10,2),
  totalLetras varchar(255),
  pagoEfectivo decimal(10,2),
  pago_tarjeta decimal(10,2),
  cambioVuelto decimal(10,2),
  idUsuario int(11) not null,
  idSucursal int(11) not null,
  estadoSunat varchar(10),
  mensajeSunat varchar(255),
  estadoPago varchar(255) DEFAULT 'pendiente',
  fechaCancelacion DATETIME,
  estadoServicio varchar(255),
  recorte decimal(10,2),
  idafectacionigv int(11),
  FOREIGN KEY (idClienteServicio) REFERENCES clientes_servicios(idClienteServicio),
  FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
  FOREIGN KEY (idSucursal) REFERENCES sucursales(idSucursal),
  FOREIGN KEY (idafectacionigv) REFERENCES tipoafectacion_igv(idafectacionigv)
)ENGINE=InnoDb;