<form  method='POST' enctype="multipart/form-data">		
    <table id='item-form-table'>
        <td style='display:none;'><input type="text" name="id" value='<?php if(isset($id)) echo $id?>' ></td>
        <tr>
            <td>Модель гаджета:</td>
            <td><input type="text" maxlength="30" name="name_model" value='<?php if(isset($name_model)) echo $name_model?>' ></td>
        </tr>
        <tr>
            <td>Описание:</td> 
            <td>
				<textarea name="description" cols="70" rows="5" placeholder="Введите текст"><?php if(isset($description)) echo $description?></textarea>
			</td>
        </tr>
        <tr>
            <td>Название:</td>
            <td>
                <select name="strength">
                    <option value="Apple" <?php if(isset($strength)) if($strength == 'Apple') {echo "selected='selected'";}?>>Apple</option>
                    <option value="Xiaomi" <?php if(isset($strength)) if($strength == 'Xiaomi') {echo "selected='selected'";}?>>Xiaomi</option>
					<option value="Asus" <?php if(isset($strength)) if($strength == 'Asus') {echo "selected='selected'";}?>>Asus</option>
					<option value="HTC" <?php if(isset($strength)) if($strength == 'HTC') {echo "selected='selected'";}?>>HTC</option>
					<option value="Honor" <?php if(isset($strength)) if($strength == 'Honor') {echo "selected='selected'";}?>>Honor</option>
					<option value="Lenovo" <?php if(isset($strength)) if($strength == 'Lenovo') {echo "selected='selected'";}?>>Lenovo</option>
					<option value="ZTE" <?php if(isset($strength)) if($strength == 'ZTE') {echo "selected='selected'";}?>>ZTE</option>
					<option value="Alcatel" <?php if(isset($strength)) if($strength == 'Alcatel') {echo "selected='selected'";}?>>Alcatel</option>
					<option value="Nokia" <?php if(isset($strength)) if($strength == 'Nokia') {echo "selected='selected'";}?>>Nokia</option>
					<option value="Samsung" <?php if(isset($strength)) if($strength == 'Samsung') {echo "selected='selected'";}?>>Samsung</option>
                </select>
            </td>
        </tr> 
        <tr>
            <td>Ёмкость аккумулятора, мАч:</td>
            <td>
                <select name="weight">
                    <option value="2500" <?php if(isset($weight)) if($weight == '2500') {echo "selected='selected'";}?>>2500</option>
                    <option value="2750" <?php if(isset($weight)) if($weight == '2750') {echo "selected='selected'";}?>>2750</option>
					<option value="3000" <?php if(isset($weight)) if($weight == '3000') {echo "selected='selected'";}?>>3000</option>
					<option value="3800" <?php if(isset($weight)) if($weight == '3800') {echo "selected='selected'";}?>>3800</option>
					<option value="4000" <?php if(isset($weight)) if($weight == '4000') {echo "selected='selected'";}?>>4000</option>
					<option value="4100" <?php if(isset($weight)) if($weight == '4100') {echo "selected='selected'";}?>>4100</option>
					<option value="4200" <?php if(isset($weight)) if($weight == '4200') {echo "selected='selected'";}?>>4200</option>
                </select>
            </td>
        </tr>			 		
        <tr>
            <td>Цена:</td>
            <td><input type='text' name='price' size='10' value='<?php if(isset($price)) echo $price?>'>&nbsp;руб.</td>
        </tr>
        <tr>
            <td>Изображение:</td> 
            <td><input type='file' accept='image/jpeg' name='uploadfile' value="<?php if(isset($uploadlink)) echo $uploadlink?>"></td>
        </tr>
    </table>
    <input class='btn' type='submit' value='Сохранить'>
</form>