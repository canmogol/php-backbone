<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="editContainer" class="editContainer">
<xsl:for-each select="attribute">
<span class="title">Update</span>
<form action="?stack=attribute&amp;action=attribute&amp;method=update" method="POST">
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
			attribute_type_id:
		</td>
		<td>
			<select name="attribute_type_id">
			<xsl:for-each select="/root/attribute_types/attribute_type">
				<xsl:choose>
					<xsl:when test="id = /root/attribute_types/attribute_type">
						<option value="{id}" selected="true"><xsl:value-of select="name" /></option>
					</xsl:when>
					<xsl:otherwise>
						<option value="{id}"><xsl:value-of select="name" /></option>
					</xsl:otherwise>
			</xsl:choose>
			</xsl:for-each>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			name:
		</td>
		<td>
			<input type="text" name="name" value="{name}"/>
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
