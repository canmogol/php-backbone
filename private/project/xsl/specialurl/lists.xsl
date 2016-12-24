<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="entryContainer" class="entryContainer">
<form action="?stack=specialurl&amp;action=specialurl&amp;method=insert" method="POST">
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
</div>

<div class="listingContainer">

<table>
	<thead>
	<tr>
		<td>
			<a href="?stack=specialurl&amp;action=specialurl&amp;method=lists&amp;orderSelection=id&amp;">id</a>
		</td>
		<td>
			<a href="?stack=specialurl&amp;action=specialurl&amp;method=lists&amp;orderSelection=stack_id&amp;">stack_id</a>
		</td>
		<td>
			<a href="?stack=specialurl&amp;action=specialurl&amp;method=lists&amp;orderSelection=action_method_id&amp;">action_method_id</a>
		</td>
		<td>
			<a href="?stack=specialurl&amp;action=specialurl&amp;method=lists&amp;orderSelection=url&amp;">url</a>
		</td>
		<td>
			<a href="?stack=specialurl&amp;action=specialurl&amp;method=lists&amp;orderSelection=regexp&amp;">regexp</a>
		</td>
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select="special_urls/special_url">
	<xsl:choose>
	<xsl:when test="position() mod 2 = 0 ">
	
	<tr class="bg1">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="stack_id" />
		</td>
		<td>
			<xsl:value-of select="action_method_id" />
		</td>
		<td>
			<xsl:value-of select="url" />
		</td>
		<td>
			<xsl:value-of select="regexp" />
		</td>
		<td>
			<a href="?stack=specialurl&amp;action=specialUrl&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=specialurl&amp;action=specialUrl&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class="bg0">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="stack_id" />
		</td>
		<td>
			<xsl:value-of select="action_method_id" />
		</td>
		<td>
			<xsl:value-of select="url" />
		</td>
		<td>
			<xsl:value-of select="regexp" />
		</td>
		<td>
			<a href="?stack=specialurl&amp;action=specialUrl&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=specialurl&amp;action=specialUrl&amp;method=delete&amp;id={id}">Delete</a>
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
