<table style="width: 100%">
<tr>
	<td style="width: 50%">
		{if $logo_path}
			<img src="{$logo_path}" style="width:{$width_logo}px; height:{$height_logo}px;" />
		{/if}
	</td>
	<td style="width: 50%; text-align: right;">
		<table style="width: 100%">
			<tr>
				<td style="font-weight: bold; font-size: 14pt; width: 100%">{if isset($header)}{$header|escape:'html':'UTF-8'}{/if}</td>
			</tr>
			<tr>
				<td style="font-size: 12pt;">{$shop_name|escape:'html':'UTF-8'}</td>
			</tr>
			<tr>
				<td style="font-size: 12pt;">{$shopaddress|escape:'html':'UTF-8'}</td>
			</tr>
			<tr>
				<td style="font-size: 12pt;">{$shop_phone|escape:'html':'UTF-8'}</td>
			</tr>
		</table>
	</td>
</tr>
</table>
