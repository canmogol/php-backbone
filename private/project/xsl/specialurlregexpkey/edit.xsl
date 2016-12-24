<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="editContainer" class="editContainer">
<xsl:for-each select="special_url_regexp_key">
<span class="title">Update</span>
<form action="?stack=specialurlregexpkey&amp;action=specialurlregexpkey&amp;method=update" method="POST">
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
			special_url_id:
		</td>
		<td>
			<input type="text" name="special_url_id" value="{special_url_id}"/>
		</td>
	</tr>
	<tr>
		<td>
			key:
		</td>
		<td>
			<input type="text" name="key" value="{key}"/>
		</td>
	</tr>
	<tr>
		<td>
			position:
		</td>
		<td>
			<input type="text" name="position" value="{position}"/>
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
