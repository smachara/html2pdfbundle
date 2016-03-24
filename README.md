smacharaHtml2pdfBundle
=======================

This is a Bundle to use the last version of spipu-Html2pdf as a service in Symfony2 applications.

I did this bundle because "ensepar/html2pdf-bundle" does not use the last versions of spipu-Html2pdf and TCPDF. The rest still the same.

Installation
------------
### Step 1: Setup Bundle and dependencies
```
composer require smachara/html2pdf-bundle
```

### Step 2: Configure the autoloader

Add the `smachara` namespace to your autoloader:

``` php
// app/autoload.php
<?php
// ...
$loader->add('smachara', __DIR__.'/../vendor');
```

### Step 3: Enable the bundle in the kernel

Add the bundle to the `registerBundles()` method in your kernel:

``` php
// app/AppKernel.php
<?php

public function registerBundles()
{
    $bundles = array(
        // ...
        new smachara\html2pdfbundle\smacharaHtml2pdfBundle(),
    );
}
```

How to use ?
------------

In your action:

```php

public function printAction()
    {
        $pdf = $this->get('html2pdf_factory')->create();
        $html = $this->renderView('PdfBundle:Pdf:content.html.twig', array( 'preview' => false));
        $pdf->writeHTML($html);
        $response = new Response($pdf->Output('test.pdf','D'));
        return $response;
    }
```

You can pass every option you would pass to $pdf, for instance :

```
$pdf = $this->get('html2pdf_factory')->create('P', 'A4', 'en', true, 'UTF-8', array(10, 15, 10, 15));
```

If the previous arguments are not provided, the factory uses its own default values. You can
change this default values by adding the bundle configuration to your `app/config/config.yml` :

```yml
smachara_html2pdf:
    orientation: P
    format: A4
    lang: en
    unicode: true
    encoding: UTF-8
    margin: [10,15,10,15]
```

License
-------
