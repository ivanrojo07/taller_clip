<form action="">
    <input id="nombre_obra" type="text" name="nombre">
    <input id="no_piezas_obra" type="text" name="no_piezas">
    <input type="number" name="alto">
    <input type="number" name="ancho">
    <input type="number" name="profundidad">
    <select name="tipo_material" id="tipomaterialselect">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <textarea name="descipcion" id="descipcion_obra" ></textarea>










    <div class="col-6 mb-2">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Sección</label>
							</div>
							<select name="seccion" required class="custom-select" id="tipoMaterial" form="explosionadoForm">
								<option value="">SELECCIONAR</option>
								<option value="montaje">Montaje</option>
								<option value="proteccion">Protección</option>
								<option value="marcos">Marcos y Bastidores</option>
								<option value="marialuisa">Maria Luisa</option>
								<option value="generales">Generales</option>
							</select>
						</div>
					</div>
					<div class="col-6 mb-2">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Material</label>
							</div>
							<select name="descripcion" required class="custom-select" id="materiales" form="explosionadoForm">
							</select>
						</div>
					</div>
    
</form>
