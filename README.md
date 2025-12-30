<div align="center">
  <img src="media/logo.svg" width="220" alt="CPC Valve Industry" />
  <h1>CPC Valve Industry Web</h1>
  <p>Category driven product experience with Custom HTML, Custom PHP, and WordPress CMS</p>

  <p>
    <a href="#overview">Overview</a> •
    <a href="#why-this-architecture">Why this architecture</a> •
    <a href="#how-it-works">How it works</a> •
    <a href="#project-structure">Project structure</a> •
    <a href="#setup">Setup</a> •
    <a href="#deployment">Deployment</a>
  </p>

  <p>
    <img alt="Stack" src="https://img.shields.io/badge/Stack-WordPress%20%7C%20PHP%20%7C%20HTML%20%7C%20CSS%20%7C%20JS-0b5cab">
    <img alt="Content model" src="https://img.shields.io/badge/Content%20Model-Categories%20%26%20Category%20Types-0b5cab">
    <img alt="Focus" src="https://img.shields.io/badge/Focus-UX%20%26%20Performance-0b5cab">
  </p>
</div>

<br>

## Overview
CPC Valve Industry Web is a category driven website built to deliver a cleaner browsing experience than classic product-first navigation.

Instead of managing every page as a WooCommerce product, we use:
• WordPress categories as the main content backbone  
• A custom "category type" layer to shape different page templates  
• Custom PHP and custom HTML blocks for full control of UI and performance

This makes managing pages easier, keeps the navigation consistent, and improves the user journey.

## Why this architecture
Typical product-based setups become messy when you need:
• Many informational pages that are not real products  
• Multiple templates for different industrial categories  
• A fast and consistent UX across browsing, filters, and catalogue downloads

Our approach solves that by treating categories as first-class pages, then attaching a page behavior using category type.

## How it works
High level flow:
• Admin creates or updates Categories  
• Each category gets a Category Type (template behavior)  
• Frontend renders a category page with a custom HTML layout  
• Optional catalogue download is generated per category or per item

Common patterns used:
• Category landing page with featured cards  
• Subcategory grid and navigation  
• Template variations by category type  
• Catalogue download button mapped to a consistent URL pattern

## Project structure
Suggested structure that stays clean on cPanel and WordPress deployments:

