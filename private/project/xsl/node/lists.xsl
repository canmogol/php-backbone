<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="entryContainer" class="entryContainer">
<form action="?stack=node&amp;action=node&amp;method=insert" method="POST">
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
			NodeType:
		</td>
		<td>
			<select name="node_type_id">
				<xsl:for-each select="node_types/node_type">
					<option value="{id}"><xsl:value-of select="name" /></option>
				</xsl:for-each>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			is_visible:
		</td>
		<td>
			<input type="text" name="is_visible" value="{is_visible}"/>
		</td>
	</tr>
	<tr>
		<td>
			creation_date:
		</td>
		<td>
			<input type="text" name="creation_date" value="{creation_date}"/>
		</td>
	</tr>
	<tr>
		<td>
			last_update:
		</td>
		<td>
			<input type="text" name="last_update" value="{last_update}"/>
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
			<a href="?stack=node&amp;action=node&amp;method=lists&amp;orderSelection=id&amp;">id</a>
		</td>
		<td>
			<a href="?stack=node&amp;action=node&amp;method=lists&amp;orderSelection=node_type_id&amp;">node_type_id</a>
		</td>
		<td>
			<a href="?stack=node&amp;action=node&amp;method=lists&amp;orderSelection=is_visible&amp;">is_visible</a>
		</td>
		<td>
			<a href="?stack=node&amp;action=node&amp;method=lists&amp;orderSelection=creation_date&amp;">creation_date</a>
		</td>
		<td>
			<a href="?stack=node&amp;action=node&amp;method=lists&amp;orderSelection=last_update&amp;">last_update</a>
		</td>
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select="nodes/node">
	<xsl:choose>
	<xsl:when test="position() mod 2 = 0 ">
	
	<tr class="bg1">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			(<xsl:value-of select="node_type_id" />)
			<xsl:value-of select="NodeType/name" />
		</td>
		<td>
			<xsl:value-of select="is_visible" />
		</td>
		<td>
			<xsl:value-of select="creation_date" />
		</td>
		<td>
			<xsl:value-of select="last_update" />
		</td>
		<td>
			<a href="?stack=node&amp;action=node&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=node&amp;action=node&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class="bg0">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			(<xsl:value-of select="node_type_id" />)
			<xsl:value-of select="NodeType/name" />
		</td>
		<td>
			<xsl:value-of select="is_visible" />
		</td>
		<td>
			<xsl:value-of select="creation_date" />
		</td>
		<td>
			<xsl:value-of select="last_update" />
		</td>
		<td>
			<a href="?stack=node&amp;action=node&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=node&amp;action=node&amp;method=delete&amp;id={id}">Delete</a>
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
