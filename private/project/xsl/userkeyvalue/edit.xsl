<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="editContainer" class="editContainer">
<xsl:for-each select="user_key_value">
<span class="title">Update</span>
<form action="?stack=userkeyvalue&amp;action=userkeyvalue&amp;method=update" method="POST">
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
			user_id:
		</td>
		<td>
			<select name="user_id">
			<xsl:for-each select="/root/users/user">
				<xsl:choose>
					<xsl:when test="id = /root/users/user">
						<option value="{id}" selected="true"><xsl:value-of select="user_name" /></option>
					</xsl:when>
					<xsl:otherwise>
						<option value="{id}"><xsl:value-of select="user_name" /></option>
					</xsl:otherwise>
			</xsl:choose>
			</xsl:for-each>
		</select>
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
			value:
		</td>
		<td>
			<input type="text" name="value" value="{value}"/>
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
