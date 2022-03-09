/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";
import {
	RichText,
	InspectorControls
  } from "@wordpress/block-editor";
  import { PanelBody, PanelRow, TextControl } from "@wordpress/components";
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from "@wordpress/block-editor";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 * @return {WPElement} Element to render.
 */

export default function Edit({attributes, setAttributes}) {

	const { buttonText, formId } = attributes

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title={__('Form Id', 'servblocks')} initialOpen>
					<PanelRow>
						<TextControl
							label="Marketo Form ID"
							value={formId}
							onChange={(formId) => setAttributes({formId})}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<RichText
				tagName="button"
				onChange={(buttonText) => setAttributes({buttonText})}
				value={buttonText}
				placeholder={__('LEARN MORE', 'servblocks')}
			/>
		</div>
	);
}
