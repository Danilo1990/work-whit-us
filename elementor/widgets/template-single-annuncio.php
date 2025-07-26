<?php

namespace Elementor;

use Elementor\Controls_Manager;

class Widget_Template_Annuncio extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'single_annuncio';
	}
	
	public function get_title() {
		return 'Single annuncio';
	}
	
	public function get_icon() {
		return 'eicon-site-identity';
	}
		
    protected function _register_controls() {}


	protected function get_terms_array($taxonomy) {
		$terms = get_the_terms(get_the_ID(), $taxonomy);
		if (!empty($terms) && !is_wp_error($terms)) {
			return array_map('esc_html', wp_list_pluck($terms, 'name'));
		}
		return [];
	}

	protected function get_all_luoghi() {
		global $wpdb;
	
		$results = $wpdb->get_col("
			SELECT DISTINCT meta_value 
			FROM $wpdb->postmeta 
			WHERE meta_key = '_annuncio_luogo' 
			AND meta_value != ''
		");
	
		$luoghi = [];
		foreach ($results as $val) {
			$decoded = maybe_unserialize($val);
			if (is_array($decoded)) {
				$luoghi = array_merge($luoghi, $decoded);
			} else {
				$luoghi[] = $decoded;
			}
		}
	
		return array_unique(array_map('trim', $luoghi));
	}

	protected function render() {

        $output .= '<div class="annunci-wrapper">';

		if ($query->have_posts()) {
			while ($query->have_posts()) {

				$query->the_post();
				$tipologiaArray = $this->get_terms_array('tipologia');
				$areeArray = $this->get_terms_array('aree');

				$salary = get_post_meta(get_the_ID(), '_annuncio_salary', true);
				$expiry = get_post_meta(get_the_ID(), '_annuncio_expiry_date', true);
				$luogo  = get_post_meta(get_the_ID(), '_annuncio_luogo', true);

				if (is_array($luogo)) {
					$luogoDisplay = implode(', ', array_map('esc_html', $luogo));
				} else {
					$luogoDisplay = esc_html($luogo);
				}

				$trimmedContent = wp_trim_words( get_the_content() , $numberCharacters );
				
				$output .= '<div class="annuncio-item">';
					$output .= '<div class="text-annuncio">';
						$output .= '<h2>' . get_the_title() . '</h2>';
						foreach ($areeArray as $area) {
							$output .= '<h4>' . $area .'</h4>';
						}
						if($showExcepert == 'yes') {
							$output .= '<div class="excepert-item">' . $trimmedContent . '</div>';
						}
						$output .= '<ul class="meta-annuncio">';
							if($luogoDisplay && $showPlace == 'yes') {
								$output .= '<li>' . $luogoDisplay .'</li>';
							}
							if($showTipology == 'yes') {
								foreach ($tipologiaArray as $type) {
									$output .= '<li>' . $type .'</li>';
								}
							}                        
						$output .= '</ul>';
					$output .= '</div>';
					$output .= '<div class="cta-annuncio">';
						$output .= '<a class="btn btn-cta-annuncio" href="'.get_the_permalink().'">'.$btnText.'</a>';
					$output .= '</div>';
				$output .= '</div>';
			}
			wp_reset_postdata();
		} else {
			$output .= '<p>Nessun annuncio disponibile.</p>';
		}

		$output .= '</div>';
		
		echo $output;
    }
	protected function _content_template() { }	
}