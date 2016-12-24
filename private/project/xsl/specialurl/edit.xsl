<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="editContainer" class="editContainer">
<xsl:for-each select="special_url">
<span class="title">Update</span>
<form action="?stack=specialurl&amp;action=specialurl&amp;method=update" method="POST">
<table>
	<tbody>
	
	
	<tr>
		<td>
			id:
		</td>
		<td>
			<input type="text" name="id" value="{id}"/>
		</td>
	</tr>
	<tr>
		<td>
			stack_id:
		</td>
		<td>
			<input type="text" name="stack_id" value="{stack_id}"/>
		</td>
	</tr>
	<tr>
		<td>
			action_method_id:
		</td>
		<td>
			<input type="text" name="action_method_id" value="{action_method_id}"/>
		</td>
	</tr>
	<tr>
		<td>
			url:
		</td>
		<td>
			<input type="text" name="url" value="{url}"/>
		</td>
	</tr>
	<tr>
		<td>
			regexp:
		</td>
		<td>
			<input type="text" name="regexp" value="{regexp}"/>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" name="submitbutton" value="Ok"/>
		</td>
	</tr>
	
	</tbody>
</table>
</form>
</xsl:for-each>

</div>
</xsl:template>
</xsl:stylesheet>
