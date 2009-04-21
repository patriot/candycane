<h2><?php echo h($wiki->pretty_title($page_title)) ?></h2>

<% form_for :content, @content, :url => {:action => 'edit', :page => @page.title}, :html => {:id => 'wiki_form'} do |f| %>
<%= f.hidden_field :version %>
<%= error_messages_for 'content' %>

<p><%= f.text_area :text, :cols => 100, :rows => 25, :class => 'wiki-edit', :accesskey => accesskey(:edit) %></p>
<p><label><%= l(:field_comments) %></label><br /><%= f.text_field :comments, :size => 120 %></p>
<p><%= submit_tag l(:button_save) %>
   <%= link_to_remote l(:label_preview), 
                       { :url => { :controller => 'wiki', :action => 'preview', :id => @project, :page => @page.title },
                         :method => 'post',
                         :update => 'preview',
                         :with => "Form.serialize('wiki_form')",
                         :complete => "Element.scrollTo('preview')"
                       }, :accesskey => accesskey(:preview) %></p>
<%= wikitoolbar_for 'content_text' %>
<% end %>

<div id="preview" class="wiki"></div>

<% content_for :header_tags do %>
  <%= stylesheet_link_tag 'scm' %>
<% end %>

<?php $candy->html_title(h($wiki->pretty_title($page_title))) ?>
