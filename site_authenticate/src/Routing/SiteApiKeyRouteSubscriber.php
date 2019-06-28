<?php

namespace Drupal\site_authenticate\Routing;

// Classes referenced in this class
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class SiteApiKeyRouteSubscriber extends RouteSubscriberBase
{
    /**
     * {@inheritdoc}
     */
    protected function alterRoutes(RouteCollection $collection)
    {
        // Change form for the system.site_information_settings route
        // to Drupal\site_authenticate\Form\SiteApiKeySiteInformationForm
        if($route = $collection->get('system.site_information_settings'))
        {
            $route->setDefault('_form', 'Drupal\site_authenticate\Form\SiteApiKeySiteInformationForm');
        }
    }
}
?>