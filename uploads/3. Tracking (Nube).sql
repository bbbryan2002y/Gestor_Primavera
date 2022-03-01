DECLARE @VAR1 VARCHAR(17), @VAR2 VARCHAR(17);

/*Solo se puede editar esta parte***********/

SET @VAR1='20210803 00:00:00'; /*FECHA DEL INICIAL*/
SET @VAR2='20210803 23:59:59'; /*FECHA DEL FINAL*/

/******************************************/

SELECT

ISNULL((SELECT [f200_razon_social] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t200_mm_terceros]
WHERE [f200_rowid]=(SELECT TOP 1 [f210_rowid_tercero] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t210_mm_vendedores]
WHERE [f210_id] = (SELECT [f201_id_vendedor] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t201_mm_clientes] 
WHERE [t201_mm_clientes].[f201_rowid_tercero]= [f430_rowid_tercero_fact]
AND [f201_id_sucursal]=[f430_id_sucursal_fact]))),'') AS Nombre_Vendedor_Cliente

,(SELECT [f200_razon_social] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t200_mm_terceros] 
WHERE [f460_rowid_tercero_rem] = [t200_mm_terceros].[f200_rowid]) AS Razon_Social_Cliente

,(SELECT [f013_descripcion] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t013_mm_ciudades]
WHERE [f013_id] = 
(SELECT [f015_id_ciudad] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t015_mm_contactos]
WHERE [f015_rowid] =
(SELECT [f201_rowid_contacto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t201_mm_clientes]
WHERE [f460_rowid_tercero_rem] = [f201_rowid_tercero]
AND [f460_id_sucursal_rem]= [f201_id_sucursal]
)
)
AND [f013_id_depto] = 
(SELECT [f015_id_depto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t015_mm_contactos]
WHERE [f015_rowid] =
(SELECT [f201_rowid_contacto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t201_mm_clientes]
WHERE [f460_rowid_tercero_rem] = [f201_rowid_tercero]
AND [f460_id_sucursal_rem]= [f201_id_sucursal]
)
)
AND [f013_id_pais] = 
(SELECT [f015_id_pais] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t015_mm_contactos]
WHERE [f015_rowid] =
(SELECT [f201_rowid_contacto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t201_mm_clientes]
WHERE [f460_rowid_tercero_rem] = [f201_rowid_tercero]
AND [f460_id_sucursal_rem]= [f201_id_sucursal]
)
)
) AS Ciudad_Cliente

,ISNULL(CONVERT(CHAR(10),[f430_id_fecha],103),'')AS Fecha_PV
,ISNULL(CONVERT(CHAR(10),[f430_fecha_ts_creacion],103),'') AS Fecha_Creacion_PV
,ISNULL(CONVERT(VARCHAR,[f430_fecha_ts_creacion], 108),'') AS Hora_Creacion_PV
,ISNULL(LTRIM(RTRIM([f430_id_tipo_docto]))+'-'+CAST(RIGHT('00000000' + Ltrim(Rtrim([f430_consec_docto])),8) AS varchar),'') as Cons_PV
,ISNULL((SELECT [f054_descripcion] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t054_mm_estados] 
WHERE [f054_id_grupo_clase_docto]=502 AND [f430_ind_estado]=[f054_id]),'') AS Estado_PV
,ISNULL(CONVERT(CHAR(10),[f430_fecha_ts_aprobacion_cart],103),'') AS Fecha_Aprob_Cartera
,ISNULL(CONVERT(VARCHAR,[f430_fecha_ts_aprobacion_cart],108),'') AS Hora_Cartera
,ISNULL([f430_num_docto_referencia],'') AS Orden_Compra
,ISNULL((SELECT [f208_descripcion] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t208_mm_condiciones_pago] AS Condicion_Pago
WHERE [f430_id_cond_pago]=[f208_id] AND [f208_id_cia]=1),'') AS Cond_Pago
,ISNULL([f430_notas],'') AS Notas_PV

--INICIO CAMPO ENTIDAD DINAMICA COMPROMISO ---------
,ISNULL(convert(varchar(1),(select compromiso
from [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[aaCompromisoPV]
WHERE id = 'Compromiso'
and id_pedido=[f430_rowid])),'') AS Nro_Compromiso
--FIN CAMPO ENTIDAD DINAMICA COMPROMISO ---------

-- INFORMACION PEDIDO WMS - ENTIDAD RM
,ISNULL(CONVERT(VARCHAR(9),(select top 1 texto
from [InformesPrimavera].[dbo].[aGuia]
WHERE id = 'nro_pedido_wms'
AND id_factura=[t460_cm_docto_remision_venta].[f460_rowid_docto])),'') AS nro_pedido_wms
--FIN INFORMACION PEDIDO WMS - ENTIDAD RM
--
--CAMPOS REMISIONES
,CONVERT(CHAR(10),[f460_fecha_ts_aprobacion_cm],103) AS Fecha_RM

--Campo agregado el 01-11-2016 hora remisión
,CONVERT(VARCHAR,[f460_fecha_ts_aprobacion_cm],108) AS Hora_Aprob_RM
,(SELECT LTRIM(RTRIM([f350_id_tipo_docto]))+'-'+CAST(RIGHT('00000000' + Ltrim(Rtrim([f350_consec_docto])),8) AS VARCHAR) 
FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t350_co_docto_contable]
WHERE [f460_rowid_docto]=[f350_rowid]) AS Nro_Remision

,(SELECT [f054_descripcion] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t054_mm_estados] 
WHERE [f054_id_grupo_clase_docto]=503 AND [f460_ind_estado_cm]=[f054_id]) AS Estado_RM

,[f460_vlr_bruto] AS Valor_RM

--CAMPOS FACTURAS*************************************************************************
,ISNULL((SELECT LTRIM(RTRIM([f350_id_tipo_docto]))+'-'+CAST(RIGHT('00000000' + Ltrim(Rtrim([f350_consec_docto])),8) AS VARCHAR) 
FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t350_co_docto_contable]
WHERE [f460_rowid_docto_factura]=[f350_rowid]),'') AS Nro_Factura

,ISNULL(CONVERT(CHAR(10),[f461_ts],103),'') AS Fecha_Factura

,ISNULL(CONVERT(CHAR(10),[f461_ts],108),'') AS Hora_Factura

,ISNULL((SELECT [f461_vlr_neto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t461_cm_docto_factura_venta] 
WHERE [f460_rowid_docto_factura] = [f461_rowid_docto]),'') AS Valor_Factura

,ISNULL([f461_notas],'') AS Notas_Fact

,ISNULL((SELECT LTRIM(RTRIM([f463_id_tipo_docto]))+'-'+CAST(RIGHT('00000000' + Ltrim(Rtrim([f463_consec_docto])),8) AS VARCHAR) 
FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t463_cm_docto_planilla]
WHERE [f463_rowid] = 
(SELECT [f464_rowid_docto_planilla] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t464_cm_docto_planilla_rel]
WHERE [f464_rowid_docto_relacion] = [f460_rowid_docto_factura]
--OR [f464_rowid_docto_relacion] = [f460_rowid_docto]
AND [f464_ind_estado]!=2
) 
--AND [f463_ind_estado]!=9

),'') AS Nro_Planilla

-- FECHA CREACION PLC
,ISNULL(CONVERT(CHAR(10),(SELECT [f463_fecha_ts_aprobacion]
FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t463_cm_docto_planilla]
WHERE [f463_rowid] = 
(SELECT [f464_rowid_docto_planilla] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t464_cm_docto_planilla_rel]
WHERE [f464_rowid_docto_relacion] = [f460_rowid_docto_factura]
--OR [f464_rowid_docto_relacion] = [f460_rowid_docto]
AND [f464_ind_estado]!=2
)),103),'') AS Fecha_Recogida

-- FECHA CIERRE PLC
,ISNULL(CONVERT(CHAR(10),(SELECT [f463_fecha_ts_cierre]
FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t463_cm_docto_planilla]
WHERE [f463_rowid] = 
(SELECT [f464_rowid_docto_planilla] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t464_cm_docto_planilla_rel]
WHERE [f464_rowid_docto_relacion] = [f460_rowid_docto_factura]
--OR [f464_rowid_docto_relacion] = [f460_rowid_docto]
AND [f464_ind_estado]!=2
)),103),'') AS Fecha_Entrega

-- NOTAS PLC----------------------------------------------------------------------------
,ISNULL((SELECT [f464_notas] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t464_cm_docto_planilla_rel]
WHERE [f464_rowid_docto_relacion] = [f460_rowid_docto_factura]
--OR [f464_rowid_docto_relacion] = [f460_rowid_docto]
AND [f464_ind_estado]!=2
),'') AS Novedades
-----------------------------------------------------------------------------------------

--SE AGREGA CAMPO DE MOTIVO DE ANULACIÓN FACTURA
,ISNULL((SELECT [f1461_descripcion] FROM  [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t1461_mc_motivos_otros]
WHERE (SELECT [f350_id_motivo_otros] 
FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t350_co_docto_contable]
WHERE [f460_rowid_docto]=[f350_rowid])=[f1461_id]
AND [f1461_id_cia]=1),'') AS Motivo_anulacion

--INICIO-GUIA COORDINADORA *********************************************************************************
--***************************************************************************************************
,ISNULL((select texto
from [InformesPrimavera].[dbo].[aGuia]
WHERE id = 'no_guia'
and id_factura=[t460_cm_docto_remision_venta].[f460_rowid_docto_factura]),'') AS nro_guia


,ISNULL((select CONVERT(CHAR(10),fecha,103)
from [InformesPrimavera].[dbo].[aGuia]
WHERE id = 'f_recogida'
and id_factura=[t460_cm_docto_remision_venta].[f460_rowid_docto_factura]),'') AS f_recogida

,ISNULL((select CONVERT(CHAR(10),fecha,103)
from [InformesPrimavera].[dbo].[aGuia]
WHERE id = 'f_entrega'
and id_factura=[t460_cm_docto_remision_venta].[f460_rowid_docto_factura]),'') AS f_entrega

,ISNULL((select texto
from [InformesPrimavera].[dbo].[aGuia]
WHERE id = 'novedad'
and id_factura=[t460_cm_docto_remision_venta].[f460_rowid_docto_factura]),'') AS novedad


--FIN-GUIA COORDINADORA *********************************************************************************
--***************************************************************************************************

FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t460_cm_docto_remision_venta]
LEFT JOIN [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t430_cm_pv_docto]
ON [t460_cm_docto_remision_venta].[f460_rowid_pv_docto]=[t430_cm_pv_docto].[f430_rowid]
LEFT JOIN [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t461_cm_docto_factura_venta]
ON [t460_cm_docto_remision_venta].[f460_rowid_docto_factura]=[t461_cm_docto_factura_venta].[f461_rowid_docto]

-- SE FILTRAN LOS DOCUMENTOS RNF Y DV ------------------------------------------------------------------
WHERE 

(SELECT [f350_id_tipo_docto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t350_co_docto_contable] 
WHERE [f460_rowid_docto]=[f350_rowid] ) <> 'DV'
AND [t460_cm_docto_remision_venta].f460_id_cia=1
--AND [f460_ind_estado_cm]=3
AND [t460_cm_docto_remision_venta].[f460_id_fecha] >= @VAR1
AND [t460_cm_docto_remision_venta].[f460_id_fecha] <= @VAR2

--********************************************************************************************************************






-- EN ESTA PARTE SE CONSULTAN LOS PEDIDOS QUE NO TIENEN REMISIÓN******************************************************
UNION

SELECT 
(SELECT [f200_razon_social] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t200_mm_terceros] 
WHERE [f430_rowid_tercero_vendedor] = [t200_mm_terceros].[f200_rowid]) AS Nombre_Vendedor

,(SELECT [f200_razon_social] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t200_mm_terceros] 
WHERE [f430_rowid_tercero_rem] = [t200_mm_terceros].[f200_rowid]) AS Razon_Social_Cliente

,(SELECT [f013_descripcion] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t013_mm_ciudades]
WHERE [f013_id] = 
(SELECT [f015_id_ciudad] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t015_mm_contactos]
WHERE [f015_rowid] =
(SELECT [f201_rowid_contacto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t201_mm_clientes]
WHERE [f430_rowid_tercero_rem] = [f201_rowid_tercero]
AND [f430_id_sucursal_rem]= [f201_id_sucursal]
)
)
AND [f013_id_depto] = 
(SELECT [f015_id_depto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t015_mm_contactos]
WHERE [f015_rowid] =
(SELECT [f201_rowid_contacto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t201_mm_clientes]
WHERE [f430_rowid_tercero_rem] = [f201_rowid_tercero]
AND [f430_id_sucursal_rem]= [f201_id_sucursal]
)
)
AND [f013_id_pais] = 
(SELECT [f015_id_pais] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t015_mm_contactos]
WHERE [f015_rowid] =
(SELECT [f201_rowid_contacto] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t201_mm_clientes]
WHERE [f430_rowid_tercero_rem] = [f201_rowid_tercero]
AND [f430_id_sucursal_rem]= [f201_id_sucursal]
)
)
) AS Ciudad_Cliente

,CONVERT(CHAR(10),[f430_id_fecha],103)AS Fecha_PV
,CONVERT(CHAR(10),[f430_fecha_ts_creacion],103) AS Fecha_Creacion_PV
,CONVERT(VARCHAR,[f430_fecha_ts_creacion], 108) AS Hora_Creacion_PV
,LTRIM(RTRIM([f430_id_tipo_docto]))+'-'+CAST(RIGHT('00000000' + Ltrim(Rtrim([f430_consec_docto])),8) AS varchar) as Cons_PV
,(SELECT [f054_descripcion] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t054_mm_estados] 
WHERE [f054_id_grupo_clase_docto]=502 AND [f430_ind_estado]=[f054_id]) AS Estado_PV
,CONVERT(CHAR(10),[f430_fecha_ts_aprobacion_cart],103) AS Fecha_Aprob_Cartera
,CONVERT(CHAR(10),[f430_fecha_ts_aprobacion_cart],108) AS Hora_Cartera
,[f430_num_docto_referencia] AS Orden_Compra
,(SELECT [f208_descripcion] FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t208_mm_condiciones_pago] AS Condicion_Pago
WHERE [f430_id_cond_pago]=[f208_id] AND [f208_id_cia]=1) AS Cond_Pago
,[f430_notas] AS Notas_PV
--INICIO CAMPO ENTIDAD DINAMICA COMPROMISO ---------
,ISNULL(convert(varchar(1),(select compromiso
from [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[aaCompromisoPV]
WHERE id = 'Compromiso'
and id_pedido=[f430_rowid])),'') AS Nro_Compromiso
--FIN CAMPO ENTIDAD DINAMICA COMPROMISO ---------
,''
,''
,''
,''
,''
,''
,''
,''
,''
,0
,''
,''
,''
,''
,''
,''
,''
,''
,''
,''

FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t430_cm_pv_docto]

WHERE NOT EXISTS (SELECT * FROM [papelesconect.siesacloud.com,20446].[UnoEE_PapelesPri_Real].[dbo].[t460_cm_docto_remision_venta]
WHERE [t460_cm_docto_remision_venta].f460_rowid_pv_docto = [t430_cm_pv_docto].f430_rowid)
AND [t430_cm_pv_docto].f430_id_cia=1
AND [t430_cm_pv_docto].[f430_id_fecha] >= @VAR1
AND [t430_cm_pv_docto].[f430_id_fecha] <= @VAR2
