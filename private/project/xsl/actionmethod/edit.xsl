<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="editContainer" class="editContainer">
<xsl:for-each select="action_method">
<span class="title">Update</span>
<form action="?stack=actionmethod&amp;action=actionmethod&amp;method=update" method="POST">
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
			action:
		</td>
		<td>
			<input type="text" name="action" value="{action}"/>
		</td>
	</tr>
	<tr>
		<td>
			method:
		</td>
		<td>
			<input type="text" name="method" value="{method}"/>
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
