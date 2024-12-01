/* global breakdanceConfig */
const { InspectorControls } = wp.blockEditor;
const { PanelBody, Button, Icon } = wp.components;

export default function Sidebar( props ) {
	const showEditButton = !! props.blockId;
	const builderURL = breakdanceConfig.builderLoaderUrl.replace( '%%POSTID%%', props.blockId );

	const refreshIcon = (
		<Icon
			icon={ () => (
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width={ 16 }>
					<path fill="currentColor" d="M440.65 12.57l4 82.77A247.16 247.16 0 00255.83 8C134.73 8 33.91 94.92 12.29 209.82A12 12 0 0024.09 224h49.05a12 12 0 0011.67-9.26 175.91 175.91 0 01317-56.94l-101.46-4.86a12 12 0 00-12.57 12v47.41a12 12 0 0012 12H500a12 12 0 0012-12V12a12 12 0 00-12-12h-47.37a12 12 0 00-11.98 12.57zM255.83 432a175.61 175.61 0 01-146-77.8l101.8 4.87a12 12 0 0012.57-12v-47.4a12 12 0 00-12-12H12a12 12 0 00-12 12V500a12 12 0 0012 12h47.35a12 12 0 0012-12.6l-4.15-82.57A247.17 247.17 0 00255.83 504c121.11 0 221.93-86.92 243.55-201.82a12 12 0 00-11.8-14.18h-49.05a12 12 0 00-11.67 9.26A175.86 175.86 0 01255.83 432z" />
				</svg>
			) }
		/>
	);

	const editButton = (
		<div className="breakdance-global-block-edit">
			<Button isSecondary href={ builderURL } target="_blank">
				Edit Block with Breakdance
			</Button>

			<Button icon={ refreshIcon } onClick={ props.onRefreshClick } />
		</div>
	);

	return (
		<InspectorControls key="setting">
			<PanelBody title="Breakdance" initialOpen={ true }>
				{ props.children }
				{ showEditButton ? editButton : null }
			</PanelBody>
		</InspectorControls>
	);
}
