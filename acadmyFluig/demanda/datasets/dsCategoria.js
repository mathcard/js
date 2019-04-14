function defineStructure() {

}

function onSync(lastSyncDate) {

}

function createDataset(fields, constraints, sortFields) {
	var ds = DatasetBuilder.newDataset();
	var programa = $("#tipoProduto").val();
	ds.addColumn("codigo");
	ds.addColumn("nomeCategoria");
	
	if(programa == 'Real'){
		ds.addRow(new Array("Real", "Real 123"));
		ds.addRow(new Array("Real", "Real 456"));
		
	}else{
		ds.addRow(new Array("Dólar Americano", "Dolar 123"));
		ds.addRow(new Array("Dólar Americano", "Dolar 456"));
	}
	
	return ds;
	
}

function onMobileSync(user) {

}