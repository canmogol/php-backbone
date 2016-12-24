<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="entryContainer" class="entryContainer">
<form action="?stack=property&amp;action=property&amp;method=insert" method="POST">
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
			PropertyType:
		</td>
		<td>
			<select name="property_type_id">
				<xsl:for-each select="property_types/property_type">
					<option value="{id}"><xsl:value-of select="name" /></option>
				</xsl:for-each>
			</select>
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
</div>

<div class="listingContainer">

<table>
	<thead>
	<tr>
		<td>
			<a href="?stack=property&amp;action=property&amp;method=lists&amp;orderSelection=id&amp;">id</a>
		</td>
		<td>
			<a href="?stack=property&amp;action=property&amp;method=lists&amp;orderSelection=property_type_id&amp;">property_type_id</a>
		</td>
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select="propertys/property">
	<xsl:choose>
	<xsl:when test="position() mod 2 = 0 ">
	
	<tr class="bg1">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			(<xsl:value-of select="property_type_id" />)
			<xsl:value-of select="PropertyType/name" />
		</td>
		<td>
			<a href="?stack=property&amp;action=property&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=property&amp;action=property&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class="bg0">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			(<xsl:value-of select="property_type_id" />)
			<xsl:value-of select="PropertyType/name" />
		</td>
		<td>
			<a href="?stack=property&amp;action=property&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=property&amp;action=property&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	</xsl:otherwise>
	</xsl:choose>
	
	</xsl:for-each>
	</tbody>
</table>
</div>
</xsl:template>
</xsl:stylesheet>
