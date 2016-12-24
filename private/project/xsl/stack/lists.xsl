<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="entryContainer" class="entryContainer">
<form action="?stack=stack&amp;action=stack&amp;method=insert" method="POST">
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
			name:
		</td>
		<td>
			<input type="text" name="name" value="{name}"/>
		</td>
	</tr>
	<tr>
		<td>
			default_stack:
		</td>
		<td>
			<input type="text" name="default_stack" value="{default_stack}"/>
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
			<a href="?stack=stack&amp;action=stack&amp;method=lists&amp;orderSelection=id&amp;">id</a>
		</td>
		<td>
			<a href="?stack=stack&amp;action=stack&amp;method=lists&amp;orderSelection=name&amp;">name</a>
		</td>
		<td>
			<a href="?stack=stack&amp;action=stack&amp;method=lists&amp;orderSelection=default_stack&amp;">default_stack</a>
		</td>
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select="stacks/stack">
	<xsl:choose>
	<xsl:when test="position() mod 2 = 0 ">
	
	<tr class="bg1">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="name" />
		</td>
		<td>
			<xsl:value-of select="default_stack" />
		</td>
		<td>
			<a href="?stack=stack&amp;action=stack&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=stack&amp;action=stack&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class="bg0">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="name" />
		</td>
		<td>
			<xsl:value-of select="default_stack" />
		</td>
		<td>
			<a href="?stack=stack&amp;action=stack&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=stack&amp;action=stack&amp;method=delete&amp;id={id}">Delete</a>
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
